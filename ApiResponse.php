<?php

namespace integration\otherService;

use Response;

/**
 * Class ApiResponse
 * @package integration\otherService
 */
class ApiResponse implements Response
{
    /**
     * ApiResponse constructor.
     * @param $output
     */
    public function __construct($output)
    {
        return json_decode($output);
    }
}