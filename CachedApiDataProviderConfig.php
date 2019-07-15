<?php


namespace integration\otherService;


use Config;
use WrongConfigNameException;

/**
 * Class CachedApiDataProviderConfig
 * @package integration\otherService
 */
class CachedApiDataProviderConfig
{
    /**
     * @var Cache
     */
    private $cache;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @var Config
     */
    private $configStorage;

    /**
     * @var ApiDataProvider
     */
    private $apiDataProvider;

    /**
     * @param Cache $cache
     */
    public function setCache(Cache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @return Cache
     * @throws WrongConfigNameException
     */
    public function getCache()
    {
        if (!$this->cache) {
            throw new WrongConfigNameException;
        }
        return $this->cache;
    }

    /**
     * @param Logger $logger
     */
    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return Logger
     * @throws WrongConfigNameException
     */
    public function getLogger()
    {
        if (!$this->logger) {
            throw new WrongConfigNameException;
        }
        return $this->logger;
    }

    /**
     * @param ApiConnection $connection
     */
    public function setApiDataProvider(ApiConnection $connection)
    {
        $this->apiDataProvider = new ApiDataProvider($connection);
    }

    /**
     * @return ApiDataProvider
     * @throws WrongConfigNameException
     */
    public function getApiDataProvider()
    {
        if (!$this->apiDataProvider) {
            throw new WrongConfigNameException;
        }
        return $this->apiDataProvider;
    }

    /**
     * @param Config $config
     */
    public function setConfigStorage(Config $config)
    {
        $this->configStorage = $config;
    }

    /**
     * @return Config
     * @throws WrongConfigNameException
     */
    public function getConfigStorage()
    {
        if (!$this->configStorage) {
            throw new WrongConfigNameException;
        }
        return $this->configStorage;
    }
}