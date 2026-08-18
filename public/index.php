<?php

/*
index.php is the entry script.
Everything starts from index.php.
Whenever you visit your website, index.php is the first file that is executed.

It does all autoloading the composer packages.
It is going to import the bootstrap/app.php which actually creates the app
and then on that app it calls the handle request through the request capture.
*/

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
