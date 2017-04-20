<?php
session_set_cookie_params(((new DateTime())->modify('+10 years'))->getTimestamp());

session_start();

include 'vendor/autoloader.php';

$request = new Request();

if (isset($_POST['submit'])) {
    $db = Database::getInstance()->getConnection();

    $fields = FormValidator::validate($request->getFields(), FormValidator::TYPE_REGISTRATION);

    if (isset($fields['error'])) {
        $error = $fields['error'];
    }

    $isHasFile = !empty($_FILES['imgfile']['name']);

    if ($isHasFile && !isset($error)) {
        $infoAboutFile = App::uploadFile($_FILES['imgfile'], $fields['login'] . $_FILES['imgfile']['name']);

        if (isset($infoAboutFile['error'])) {
            $error = $infoAboutFile['error'];
        }
    }

    if (!isset($error)) {

        $columns = [];
        $values = [];

        $fields['password'] = Security::generatePassword($fields['password'], $fields['login']);

        foreach ($fields as $name => $value) {
            $columns[] = $name;
            $values[] = $value;
        }

        $columns[] = 'img_path';
        $values[] = isset($infoAboutFile['filename']) ? $infoAboutFile['filename'] : '';

        $subscribeParams = [
            'news',
            'shares',
            'groups'
        ];

        foreach ($subscribeParams as $subscribeParam) {
            $columns[] = $subscribeParam;
            $values[] = @(int)in_array($subscribeParam, $_POST['subscribe']);
        }

        foreach ($values as &$value) {
            $value = '\'' . $value . '\'';
        }


        $sql = 'INSERT INTO users (' . implode($columns, ', ') . ') VALUES (' . implode($values, ', ') . ')';


        if (Security::checkUser($db, $fields['login'])) {
            $error = 'Пользователь под таким логином уже есть';
        }

        if (!isset($error)) {
            $query = $db->prepare($sql);

            $query->execute();
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $fields['login'];
            App::redirect('login');
        }
    }
}

App::render('forms/profile', [
    'title' => 'Профиль',
    'form'  => $_POST,
    'error' => $error
]);
