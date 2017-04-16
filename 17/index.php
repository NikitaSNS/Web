<?php

session_start();

include 'vendor/autoloader.php';

$db = Database::getInstance()->getConnection();

$query = $db->prepare('SELECT name, text FROM content');
$query->execute();
$result = $query->get_result()->fetch_all(MYSQLI_ASSOC);

$site = [];

foreach ($result as $record) {
    $site[$record['name']] = $record['text'];
}

App::render('index_page', [
    'site' => $site,
]);