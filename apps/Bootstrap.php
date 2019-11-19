<?php

use Phalcon\Mvc\Application;
use Phalcon\Debug;
use Phalcon\DI\FactoryDefault;

class Bootstrap extends Application
{
	private $modules;
	private $defaultModule;

	public function __construct($defaultModule)
	{
		$this->modules = require APP_PATH . '/config/modules.php';
		$this->defaultModule= $defaultModule;
	}

	public function init()
	{
		$this->_registerServices();

		$config = $this->getDI()['config'];

		if ($config->mode == 'DEVELOPMENT') {
			$debug = new Debug();
			$debug->listen();
		}
		
		/**
		 * Load modules
		 */
		$this->registerModules($this->modules);

		echo $this->handle()->getContent();
	}

	private function _registerServices()
	{
		$defaultModule = $this->defaultModule;

		if (getenv('APPLICATION_ENV') !== 'production') {
			$envFile = ((getenv('APPLICATION_ENV') === 'testing') ? '.env.test' : '.env');
			$dotEnv = Dotenv\Dotenv::create(APP_PATH, $envFile);
			$dotEnv->load();
		}
		$env = getenv('APPLICATION_ENV');

		//setup config
		if (!$env) {
			echo "Application environment not set";
			exit;
		} else {
			$config = require APP_PATH . '/config/config.php';
		}

		$di = new FactoryDefault();
		$config = require APP_PATH . '/config/config.php';
		$modules = $this->modules;

		include_once APP_PATH . '/config/loader.php';
		include_once APP_PATH . '/config/services.php';
		include_once APP_PATH . '/config/routing.php';

		$this->setDI($di);
	}
}