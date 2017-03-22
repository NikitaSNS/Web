<?php

header('Content-Type: text/html; charset=utf-8');

echo '<pre>';

$avatarDir = 'avatars';

@mkdir($avatarDir);


$avatar = $_FILES['avatar'];

var_dump($_REQUEST);
var_dump($_FILES);
var_dump($_FILES);

$tmp = $avatar['tmp_name'];

if (is_uploaded_file($tmp)) {
    $info = getimagesize($tmp);
    if (preg_match('{image/(.*)}i$', $info['mime'])) {
        $name = iconv(
            mb_detect_encoding(basename($avatar['name'])),
            'windows-1251',
            $avatarDir . '/' . basename($avatar['name'])
        );
        move_uploaded_file($tmp, $name);
    } else {
        die('Попытка вывести неверный файл');
    }
} else {
    die('Ошибка загрузки: ' . $avatar['error']);
}

//$connect = new mysqli('localhost', 'root', '', 'test');
//
//$connect->set_charset('utf8');
//
//$query = "INSERT INTO `test_table` (`first_name`, `last_name`, `gender`, `news`, `shares`, `groups`, `phone`) VALUES ('$name', '$lastName', '$gender', 0, 0, 0, '$phone');";
//
//var_dump($query);
//$id = 2001;
//echo '<pre>';
//var_dump($res = $connect->query($query));
//var_dump($res);
//
//$connect->close();