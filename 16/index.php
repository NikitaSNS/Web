<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'vendor/autoloader.php';

define('ROOT', dirname(__FILE__));

$app = new App();

$app->handle();