<?php

use \integration\otherService\CachedApiDataProvider;
use \integration\otherService\CachedApiDataProviderConfig;

$config = new CachedApiDataProviderConfig();
//fill in params
$cachedApiDataProvider = new CachedApiDataProvider($config);
//ger results
try {
    $response = $cachedApiDataProvider->get(['user', 1]);
} catch (Exception $e) {
    echo "Error happened while request to api: {$e->getMessage()}";
}
