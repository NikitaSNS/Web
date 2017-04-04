<?php

session_start();

include 'vendor/autoloader.php';

if (!App::isAuth()) {
    App::redirect('index');
}

$db = Database::getInstance()->getConnection();

if (isset($_POST['submit'])) {

    $requiredFields = [
        new FormField('firstName', '[A-Za-zА-Яа-яЁё]{2,10}', 'Введите правильное имя'),
        new FormField('lastName', '[A-Za-zА-Яа-яЁё]{2,14}', 'Введите правильную фамилию'),
        new FormField('gender', '\w+', 'Введите правильный пол'),
        new FormField('age', '\w+', 'Введите правильный возраст'),
        new FormField('dateOfBirth', '(1899|19[0-9]{2}|200[0-9])-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])', 'Введите правельную дату рождения'),
        new FormField('phone', '(0?[1-9]|[1-9][0-9])', 'Введите правильный номер телефона'),
        new FormField('login', '\w{3,10}', 'Введите правильный логин'),
        new FormField('passwordSms', '\w{5}', 'Введите правильный пароль смс'),
        new FormField('password', '(^(?!.*[А-Яа-яЁё])(?=(?:.*[A-Z]){1})(?=(?:.*[^A-Za-z0-9]){2}).{5,13})', 'Введите правильный пароль'),
        new FormField('submit', '\w', 'Нажмите кнопку :)'),
    ];
    echo '<pre>';
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field->getFieldName()]) ||
            empty($_POST[$field->getFieldName()]) ||
            !preg_match('/^(' . $field->getPattern() . ')+$/' , $_POST[$field->getFieldName()])
        ) {
            $error = $field->getError();
            break;
        }

        ${$field->getFieldName()} = '';
    }


    if (!isset($error)) {
        echo 'no error';
        die();
    }
//
//    var_dump($error);
//
    var_dump($_POST);
    echo '</pre>';
//    die();
}

$query = $db->prepare('SELECT * FROM users WHERE login=?');
$query->bind_param('s', $_SESSION['login']);
$query->execute();
$result = $query->get_result()->fetch_assoc();

App::render('forms/profile', [
    'title' => 'Профиль',
    'form'  => $result,
    'error' => $error
]);