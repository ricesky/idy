<?php

use Phalcon\Config;

return new Config(
    [
        'mode' => getenv('APP_MODE'), //DEVELOPMENT, PRODUCTION, DEMO

        'url' => [
            'baseUrl' => getenv('BASE_URL'),
        ],
        
        'application' => [
            'libraryDir' => APP_PATH . "/lib/",
            'cacheDir' => APP_PATH . "/cache/",
        ],

        'version' => '0.1',
    ]
);
