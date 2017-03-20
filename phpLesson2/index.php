<?php

$connect = new mysqli('localhost', 'root', '', 'gruber');

$id = 2001;
echo '<pre>';
var_dump($res = $connect->query("SELECT * FROM customers")->fetch_array());

$connect->close();
