<?php

session_start();

if ($_SESSION['admin'] != true) {
    die('Нет доступа');
}

include 'vendor/autoloader.php';

$db = Database::getInstance()->getConnection();

$key = key($_POST);
$value = $_POST[$key];

if (empty($value)) {
    die('Пустое поле');
}

$sql = "UPDATE content SET `text`='$value' WHERE `name`='$key'";

$query = $db->prepare($sql);
$query->execute();

