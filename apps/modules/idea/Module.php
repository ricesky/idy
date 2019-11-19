<?php

namespace Idy\Idea;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Idy\Idea\Domain\Model' => __DIR__ . '/domain/model',
            'Idy\Idea\Infrastructure' => __DIR__ . '/infrastructure',
            'Idy\Idea\Application' => __DIR__ . '/application',
            'Idy\Idea\Controllers\Web' => __DIR__ . '/controllers/web',
            'Idy\Idea\Controllers\Api' => __DIR__ . '/controllers/api',
            'Idy\Idea\Controllers\Validators' => __DIR__ . '/controllers/validators',
        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once __DIR__ . '/config/services.php';
    }

}