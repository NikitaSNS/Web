<?php

require 'vendor/App.php';


$app = new App();

if ($app->isFormAction()) {
    $app->handleForm();
}


if ($app->isAuth()) {
    include 'profile.php';
} else {
    include 'login.php';
}