<?php

namespace integration\otherService;

use ApiResponseError;
use DataProvider;
use DateTime;
use Exception;

/**
 * Class CachedApiDataProvider
 * @package services\Logging
 */
class CachedApiDataProvider implements DataProvider
{
    /**
     * @var CachedApiDataProviderConfig
     */
    private $config;

    /**
     * CachedApiDataProvider constructor.
     * @param CachedApiDataProviderConfig $config
     */
    public function __construct(CachedApiDataProviderConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param array $input
     * @return ApiResponse
     * @throws ApiResponseError
     * @throws \WrongConfigNameException
     */
    public function get(array $input): ApiResponse
    {
        $request = new ApiRequest($input);
        return $this->internalGet($request);

    }

    /**
     * @param ApiRequest $request
     * @return ApiResponse
     * @throws ApiResponseError
     * @throws \WrongConfigNameException
     */
    public function internalGet(ApiRequest $request): ApiResponse
    {
        try {
            $item = $this->config->getCache()->getItem($this->getCacheKey($request));
            $getItemOrMiss = $item->get();
            if ($getItemOrMiss) {
                return $getItemOrMiss;
            }

            //make the request to external API and return raw result (let's suppose that it's valid json) to $result
            //we can make it because we have at $this->config all required params like
            $result = $this->config->getApiDataProvider()->internalGet($request);

            $item
                ->set($result)
                ->expiresAt(
                    (new DateTime())->modify($this->config->getConfigStorage()->getItemByName(CACHE_LIFETAME_PARAM_NAME))
                );

            return $result;
        } catch (Exception $e) {
            $this->config->getLogger()->critical('Error', $this->buildContextFromException($e));
        }

        throw new ApiResponseError;
    }

    /**
     * @param ApiRequest $input
     * @return string
     */
    public function getCacheKey(ApiRequest $input)
    {
        //php serialize will work where json_encode may fails
        return md5(serialize($input));
    }

    /**
     * @param Exception $e
     * @return array
     */
    protected function buildContextFromException(Exception $e): array
    {
        return [
            'message' => $e->getMessage(),
            'code' => $e->getCode(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'previous' => $e->getPrevious(),
            'trace' => $e->getTraceAsString()
        ];
    }
}