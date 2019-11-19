<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('memory_limit', '64M');
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');

setlocale(LC_TIME, 'id-ID');

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/apps');

date_default_timezone_set('Asia/Jakarta');

require __DIR__ . '/../vendor/autoload.php';

require_once APP_PATH . '/Bootstrap.php';

$app = new Bootstrap('idea');

$app->init();
