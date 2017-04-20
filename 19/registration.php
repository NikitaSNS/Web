<?php

session_start();

include 'vendor/autoloader.php';

if (isset($_POST['submit'])) {
    $db = Database::getInstance()->getConnection();

    $requiredFields = [
        new FormField('first_name', '[A-Za-zА-Яа-яЁё]{2,10}', 'Введите правильное имя'),
        new FormField('last_name', '[A-Za-zА-Яа-яЁё]{2,14}', 'Введите правильную фамилию'),
        new FormField('gender', '\w+', 'Введите правильный пол'),
        new FormField('age', '0?[1-9]|[1-9][0-9]', 'Введите правильный возраст'),
        new FormField('date_of_birth', '(1899|19[0-9]{2}|200[0-9])-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])',
            'Введите правельную дату рождения'),
        new FormField('phone', '((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}',
            'Введите правильный номер телефона'),
        new FormField('login', '\w{3,10}', 'Введите правильный логин'),
        new FormField('password_sms', '\w{5}', 'Введите правильный пароль смс'),
        new FormField('password', '(^(?!.*[А-Яа-яЁё])(?=(?:.*[A-Z]){1})(?=(?:.*[^A-Za-z0-9]){2}).{5,13})',
            'Введите правильный пароль'),
    ];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field->getFieldName()]) ||
            empty($_POST[$field->getFieldName()]) ||
            !preg_match('/^(' . $field->getPattern() . ')$/', $_POST[$field->getFieldName()])
        ) {
            $error = $field->getError();
            break;
        }

        ${$field->getFieldName()} = $_POST[$field->getFieldName()];
    }

    $isHasFile = !empty($_FILES['imgfile']['name']);

    if ($isHasFile) {
        $infoAboutFile = App::uploadFile($_FILES['imgfile'], $login . $_FILES['imgfile']['name']);

        if (isset($infoAboutFile['error'])) {
            $error = $infoAboutFile['error'];
        }
    }

    if (!isset($error)) {

        $columns = [];
        $values = [];

        foreach ($requiredFields as $field) {
            $columns[] = $field->getFieldName();
            $values[] = ${$field->getFieldName()};
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


        if (Security::checkUser($db, $login)) {
            $error = 'Пользователь под таким логином уже есть';
        }

        if (!isset($error)) {
            $query = $db->prepare($sql);

            $query->execute();
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $login;
            App::redirect('login');
        }
    }
}

App::render('forms/profile', [
    'title' => 'Профиль',
    'form'  => $_POST,
    'error' => $error
]);
