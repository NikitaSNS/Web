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
        new FormField('dateOfBirth', '2010-12-31', 'Введите правельную дату рождения'),
        new FormField('phone', '', 'Введите правильный номер телефона'),
        new FormField('login', '', 'Введите правильный логин'),
        new FormField('passwordSms', '', 'Введите правильный пароль смс'),
        new FormField('password', '', 'Введите правильный пароль'),
        new FormField('submit', '', 'Нажмите кнопку :)'),
    ];
    echo '<pre>';
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field->getFieldName()]) ||
            empty($_POST[$field->getFieldName()]) ||
            !preg_match('/' . $field->getPattern() . '+$/' , $_POST[$field->getFieldName()])
        ) {
            $error = $field->getError();
            break;
        }

        ${$field->getFieldName()} = '';
    }


    if (!isset($error)) {
        echo '!NO ERROR!';
    }

    var_dump($error);

    var_dump($_POST);
    die();
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