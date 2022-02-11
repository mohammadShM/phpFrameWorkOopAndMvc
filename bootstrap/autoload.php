<?php
// use Files and class ==================================================
use Dotenv\Dotenv;

// require files ==================================================
require_once "../vendor/autoload.php";
// for set env file ==================================================
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();
// require files ==================================================
require_once "../Core/Database.php";
