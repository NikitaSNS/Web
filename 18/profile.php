<?php

session_start();

include 'vendor/autoloader.php';

if (!App::isAuth()) {
    App::redirect('index');
}

$db = Database::getInstance()->getConnection();

if (isset($_POST['submit'])) {

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
        $sql = 'UPDATE users SET ';

        $params = [];

        foreach ($requiredFields as $field) {
            $params[] = $field->getFieldName() . '=\'' . ${$field->getFieldName()} . '\'';
        }

        $subscribeParams = [
            'news',
            'shares',
            'groups'
        ];

        foreach ($subscribeParams as $subscribeParam) {
            $params[] = $subscribeParam . '=' . (int)in_array($subscribeParam, $_POST['subscribe']);
        }


        $sql .= implode($params, ', ');

        if ($isHasFile) {
            $sql .= ', img_path =  \'' . $infoAboutFile['filename'] . '\'';
        }


        $sql .= ' WHERE login=?';

        $query = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($query, 's', $_SESSION['login']);
        mysqli_stmt_execute($query);
        $_SESSION['login'] = $login;
    }
}

$query = mysqli_prepare($db, 'SELECT * FROM users WHERE login=?');
mysqli_stmt_bind_param($query,'s', $_SESSION['login']);
mysqli_stmt_execute($query);
$result = mysqli_fetch_assoc(mysqli_stmt_get_result($query));

App::render('forms/profile', [
    'title' => 'Профиль',
    'form'  => $result,
    'error' => $error
]);


