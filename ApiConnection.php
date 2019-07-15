<?php

namespace integration\otherService;

use Config;
use Connection;

/**
 * Class ApiConnection
 * @package integration\otherService
 */
class ApiConnection implements Connection
{
    /**
     * @var Config
     */
    private $config;

    /**
     * ApiConnection constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->config->getItemByName(Constants::$HOST_PARAM_NAME);
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->config->getItemByName(Constants::$USER_PARAM_NAME);
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->config->getItemByName(Constants::$PASSWORD_PARAM_NAME);
    }
}