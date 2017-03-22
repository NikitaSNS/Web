<?php

header('Content-type: text/html; charset=utf-8');

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


$connect = new mysqli('localhost', 'root', '', 'test');

$connect->set_charset('utf8');

$query = "INSERT INTO `test_table` (`first_name`, `last_name`, `gender`, `news`, `shares`, `groups`, `phone`) VALUES ('$name', '$lastName', '$gender', 0, 0, 0, '$phone');";

var_dump($query);
$id = 2001;
echo '<pre>';
var_dump($res = $connect->query($query));
var_dump($res);

$connect->close();

