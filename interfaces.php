<?php

use integration\otherService\ApiRequest;
use integration\otherService\ApiResponse;

/**
 * Interface Connection
 * @package integration\otherService
 */
interface Connection
{
    public function getHost();

    public function getUser();

    public function getPassword();
}

/**
 * Interface Config
 * @package integration\otherService
 */
interface Config
{
    /**
     * @param $name
     * @return mixed
     */
    public function getItemByName($name);
}

/**
 * Interface Request
 * @package integration\otherService
 */
interface Request
{
    public function __construct($input);
}

/**
 * Interface Response
 * @package integration\otherService
 */
interface Response
{
    /**
     * Response constructor.
     * @param $output
     */
    public function __construct($output);
}

/**
 * Interface DataProvider
 * @package integration\otherService
 */
interface DataProvider
{
    public function get(array $input): ApiResponse;

    function internalGet(ApiRequest $request);
}