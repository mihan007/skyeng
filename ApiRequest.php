<?php

namespace integration\otherService;

use Request;

/**
 * Class ApiRequest
 * @package integration\otherService
 */
class ApiRequest implements Request
{
    /**
     * ApiRequest constructor.
     * @param $input
     */
    public function __construct($input)
    {
        return json_encode($input);
    }
}