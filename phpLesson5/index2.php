<?php

$count = isset($_COOKIE['count']) !== false ? $_COOKIE['count'] : 0;

$count++;

setcookie('count', $count);
echo '<pre>';


echo 'Сайт был посещен: ' . $count;

setcookie('count', $count, time() - (60 * 60 * 24 * 12));