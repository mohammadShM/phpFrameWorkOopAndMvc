<?php

// use Files and class
use Core\Router;

require_once "../vendor/autoload.php";
require_once "../Core/Database.php";
// for custom handler exception and error
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/** @var Router $router */
$router = require "../App/Router.php";

/** @noinspection PhpUnhandledExceptionInspection */
$router->dispatch($_SERVER['QUERY_STRING']);

// http://phpmvc2.devme/series/learning-php/episode/3
// http://phpmvc2.devme/sample
