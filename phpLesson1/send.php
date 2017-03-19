<?php

if (isset($_POST['name'])) {
    $name = $_POST['name'];
} else {
    die('Пустое имя');
}

if (!empty($_POST['lastName'])) {
    $lastName = $_POST['lastName'];
} else {
    die('Пустая фамилия');
}

if (!is_null($_POST['gender'])) {
    $gender = $_POST['gender'];
} else {
    $gender = 'undefined';
}

$phone = $_POST['phone'] ?? 666;


echo 'Вы зарегистрированы с данными : ' .
    $name . ', ' . $lastName . ', ' . $gender . '<br>';

echo 'Вы подписаны на : ';

foreach ($_POST['subscribe'] as $subscribe) {
    echo $subscribe . ', ';
}

