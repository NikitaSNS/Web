<?php

//include 'index3.php';
//
//$db = new DB('root', '', 'pract6', 'localhost');
//echo '<pre>';
//if ($db->getConnection()) {
//    $res = $db->query('SELECT VERSION() AS VERSION');
//    var_dump($res->fetch_all());
//}

include 'singleton.php';

$db = Database::getDb();

$res = $db->select('SELECT VERSION() AS VERSION');
var_dump($res);
