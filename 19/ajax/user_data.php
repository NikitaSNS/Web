<?php

include '../vendor/autoloader.php';

session_start();

print_r(json_encode(Security::getInfo()));
