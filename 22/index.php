<?php

session_set_cookie_params(((new DateTime())->modify('+10 years'))->getTimestamp());

session_start();

include 'vendor/autoloader.php';


App::render('index_page', [

]);