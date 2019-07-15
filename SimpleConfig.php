<?php


namespace integration\otherService;

use Config;
use WrongConfigNameException;

/**
 * Class SimpleConfig
 * @package integration\otherService
 */
class SimpleConfig implements Config
{
    /**
     * @param $name
     * @return mixed|string
     * @throws WrongConfigNameException
     */
    public function getItemByName($name)
    {
        switch ($name) {
            case Constants::$USER_PARAM_NAME:
                return 'USER';
            case Constants::$PASSWORD_PARAM_NAME:
                return 'PASSWORD';
            case Constants::$HOST_PARAM_NAME:
                return 'HOST';
            case Constants::$CACHE_LIFETAME_PARAM_NAME:
                return '+1 day';
            default:
                throw new WrongConfigNameException;
        }
    }
}