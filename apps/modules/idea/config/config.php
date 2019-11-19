<?php

use Phalcon\Config;

return new Config(
    [
        'database' => [
            'adapter' => getenv('IDEA_DB_ADAPTER'),
            'host' => getenv('IDEA_DB_HOST'),
            'username' => getenv('IDEA_DB_USERNAME'),
            'password' => getenv('IDEA_DB_PASSWORD'),
            'dbname' => getenv('IDEA_DB_NAME'),
        ], 

        'mail' => [
            'driver' => getenv('IDEA_MAIL_DRIVER'),
            'cacheDir' => APP_PATH . "/cache/mail/",
            'fromName' => getenv('IDEA_MAIL_FROM_NAME'),
            'fromEmail' => getenv('IDEA_MAIL_FROM_EMAIL'),
            'smtp' => [
                'server'    => getenv('IDEA_MAIL_SMTP_HOST'),
                'port'      => getenv('IDEA_MAIL_SMTP_PORT'),
                'username'  => getenv('IDEA_MAIL_SMTP_USERNAME'),
                'password'  => getenv('IDEA_MAIL_SMTP_PASSWORD'),
            ],
        ],
    ]
);
