<?php

// use Files and class ==================================================
use Core\Router;

// require files ==================================================
require_once "../bootstrap/autoload.php";
// for custom handler exception and error ==================================================
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');
// for set router ==================================================
/** @var Router $router */
$router = require "../App/Router.php";
// for router ==================================================
/** @noinspection PhpUnhandledExceptionInspection */
$router->dispatch($_SERVER['QUERY_STRING']);
// sample address domain ==================================================
// http://phpmvc2.devme/series/learning-php/episode/3
// http://phpmvc2.devme/sample
