<?php

session_start();

include 'vendor/autoloader.php';

if (App::isAuth()) {
    App::redirect('index');
}

if (isset($_POST['submit'])) {
    $db = Database::getInstance()->getConnection();
    $login = $_POST['login'];
    $password = $_POST['password'];


    $query = $db->prepare('SELECT * FROM users WHERE login=? AND `password`=?');
    $query->bind_param('ss', $login, $password);
    $query->execute();
    $result = $query->get_result()->fetch_assoc();
    if ($result !== null) {

        $_SESSION['auth'] = true;
        $_SESSION['admin'] = $result['is_admin'];
        $_SESSION['login'] = $login;

        App::redirect('index');
    }
}

App::render('forms/login');