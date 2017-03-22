<?php

var_dump(strlen('лол /r'));

// Открытие файла :

$f = fopen('C:/Windows/System32/drivers/etc/hosts', 'rt');
echo '<pre>';
//$lines = fread($f, 5000);

while (!feof($f)) {
    echo fgets($f);
}

// Работа с путями

$f = file('F:/myprojects/unit.png');

$f = serialize($f);

var_dump($f);

var_dump($f = unserialize($f));

file('F:/myprojects/unit.png','F:/myprojects/unit1.png', $f);

//copy()