<?php

session_set_cookie_params(((new DateTime())->modify('+10 years'))->getTimestamp());

session_start();

include 'vendor/autoloader.php';

if (App::isAuth()) {
    App::redirect('index');
}

$request = new Request();

if (!Security::checkSecurity($request->getFields())) {
    echo '<h1>Забанен</h1>';
    die();
}

if (isset($_POST['submit'])) {
    $db = Database::getInstance()->getConnection();
    $login = $_POST['login'];
    $password = $_POST['password'];

    $password = Security::generatePassword($password);

    $query = $db->prepare('SELECT * FROM users WHERE login=? AND `password`=?');
    $query->bind_param('ss', $login, $password);
    $query->execute();
    $result = $query->get_result()->fetch_assoc();
    if ($result !== null) {
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;

        App::redirect('index');
    }
}

App::render('forms/login');