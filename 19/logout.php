<?php

session_start();

include 'vendor/autoloader.php';

$request = new Request();

if (!Security::checkSecurity($request->getFields())) {
//    echo '<h1>Забанен</h1>';
//    die();
}

$_SESSION = [];
session_destroy();

App::redirect('login');