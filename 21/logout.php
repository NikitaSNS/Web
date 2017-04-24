<?php
session_set_cookie_params(((new DateTime())->modify('+10 years'))->getTimestamp());

session_start();

include 'vendor/autoloader.php';

$request = new Request();

if (!Security::checkSecurity($request->getFields())) {
    echo '<h1>Забанен</h1>';
    die();
}

$_SESSION = [];
session_destroy();

App::redirect('login');