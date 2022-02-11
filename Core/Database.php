<?php

namespace Core;

use App\Config;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
    'driver' => 'mysql',
    // 'host' => $_ENV['DB_HOST'] , // sample set by env
    'host' => Config::DB_HOST,
    'port' => Config::DB_PORT,
    'database' => Config::DB_DATABASE,
    'username' => Config::DB_USERNAME,
    'password' => Config::DB_PASSWORD,
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);
$capsule->bootEloquent();
