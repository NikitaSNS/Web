<?php

session_start();

include 'vendor/autoloader.php';

if (!App::isAuth()) {
    App::redirect('index');
}

$request = new Request();

if (!Security::checkSecurity($request->getFields())) {
    echo '<h1>Забанен</h1>';
    die();
}

$db = Database::getInstance()->getConnection();

if ($request->isHaveField('submit')) {

    $fields = FormValidator::validate($request->getFields());

    if (isset($fields['error'])) {
        $error = $fields['error'];
    }

    $isHasFile = !empty($_FILES['imgfile']['name']);

    if ($isHasFile && !isset($error)) {
        $infoAboutFile = App::uploadFile($_FILES['imgfile'], $fields['login'] . $_FILES['imgfile']['name']);

        if (isset($infoAboutFile['error'])) {
            $error = $infoAboutFile['error'];
        } else {
            $fields['img_path'] = $infoAboutFile['filename'];
        }
    }


    if (!isset($error)) {

        $params = [];

        if (isset($fields['password'])) {
            $fields['password'] = Security::generatePassword($fields['password'], $fields['login']);
        }

        foreach ($fields as $name => $value) {
            $params[] = $name . '=\'' . $value . '\'';
        }

        $subscribeParams = [
            'news',
            'shares',
            'groups'
        ];

        foreach ($subscribeParams as $subscribeParam) {
            $params[] = $subscribeParam . '=' . (int)in_array($subscribeParam, $_POST['subscribe']);
        }

        if ($fields['login'] !== $_SESSION['login']) {
            if (Security::checkUser($db, $fields['login'])) {
                $error = 'Пользователь под таким логином уже есть';
            }
        }

        if (isset($fields['password'])) {
            if ($fields['password'] === Security::getInfo('password')) {
                $error = 'Нельзя использовать старый пароль';
            }
        }

        if (!isset($error)) {

            foreach (Security::getInfoAboutUser($db, $_SESSION['login']) as $key => $item) {
                Security::saveInfo($key, $item);
            }

            $sql = 'UPDATE users SET ' . implode($params, ', ') . ' WHERE login=?';

            $query = $db->prepare($sql);
            $query->bind_param('s', $_SESSION['login']);
            $query->execute();

            $_SESSION['login'] = $fields['login'];
        }
    }
}

$result = Security::getInfoAboutUser($db, $_SESSION['login']);

App::render('forms/profile', [
    'title' => 'Профиль',
    'form'  => $result,
    'error' => $error
]);


