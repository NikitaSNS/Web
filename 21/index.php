<?php

session_set_cookie_params(((new DateTime())->modify('+10 years'))->getTimestamp());

session_start();

include 'vendor/autoloader.php';

if (!App::isAuth()) {
    App::redirect('login');
}

App::redirect('profile');