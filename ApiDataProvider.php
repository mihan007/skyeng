<?php

namespace integration\otherService;

use ApiResponseError;
use Connection;
use DataProvider;

/**
 * Class ApiDataProvider
 * @package integration\otherService
 */
class ApiDataProvider implements DataProvider
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * ApiDataProvider constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param array $input
     * @return ApiResponse
     * @throws ApiResponseError
     */
    public function get(array $input): ApiResponse
    {
        try {
            $request = new ApiRequest($input);
            return new ApiResponse($this->internalGet($request));
        } catch (\Exception $e) {
            throw new ApiResponseError;
        }
    }

    /**
     * @param ApiRequest $request
     * @return ApiResponse
     */
    function internalGet(ApiRequest $request): ApiResponse
    {
        //make the request to external API and return raw result (let's suppose that it's valid json)
    }
}