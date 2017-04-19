<?php

session_start();

include 'vendor/autoloader.php';

$_SESSION = [];
session_destroy();

App::redirect('login');