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

    $query = mysqli_prepare($db, 'SELECT * FROM users WHERE login=? AND `password`=?');
    mysqli_stmt_bind_param($query, 'ss', $login, $password);
    mysqli_stmt_execute($query);
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($query));
    if ($result !== null) {
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;

        App::redirect('index');
    }
}

App::render('forms/login');