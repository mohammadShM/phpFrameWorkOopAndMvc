<?php

use Core\Router;

$router = new Router();
$router->add('/', 'HomeController@index');
$router->add('/sample', ['uses' => 'SampleController@index', 'namespace' => 'Admin']);
$router->add('/series', 'SeriesController@index');
$router->add('/series/{slug}', 'SeriesController@serie');
$router->add('/series/{slug}/episode/{id}', 'SeriesController@episode');

return $router;
