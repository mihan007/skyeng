<?php


namespace integration\otherService;

/**
 * Class Logger
 * @package services\Logging
 */
class Logger extends Psr\Log\LoggerInterface
{
    public function critical($message, $context = [])
    {
        //do some stuff that we should do before send critical log, e.g. send sms report or something else domain specific
        return parent::critical($message, $context);
    }
}