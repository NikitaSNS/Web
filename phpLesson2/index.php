<?php

header('Content-type: text/html; charset=utf-8');

$connect = new mysqli('localhost', 'root', '', 'gruber');

$connect->set_charset('utf8');

//$data = iconv('utf-8', 'windows-1251', $data);

$id = 2001;
echo '<pre>';
var_dump($res = $connect->query("SELECT * FROM customers")->fetch_array());

$connect->close();
