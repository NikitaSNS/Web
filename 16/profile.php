<?php

session_start();

include 'vendor/autoloader.php';

if (!App::isAuth()) {
    App::redirect('index');
}

$db = Database::getInstance()->getConnection();

if (isset($_POST['submit'])) {

    $requiredFields = [
        'firstName',
        ''
        // ToDo: Implement
    ];

    if (isset($_POST['firstName'])) {
        $firstName = $_POST['firstName'];
    } else {

    }

    echo '<pre>';
    var_dump($_POST);
    die();
}

$query = $db->prepare('SELECT * FROM users WHERE login=?');
$query->bind_param('s', $_SESSION['login']);
$query->execute();
$result = $query->get_result()->fetch_assoc();

App::render('forms/profile', [
    'title' => 'Профиль',
    'form'  => $result
]);