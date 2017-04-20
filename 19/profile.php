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
    var_dump($fields);

    if (isset($fields['error'])) {
        $error = $fields['error'];
    }

    $isHasFile = !empty($_FILES['imgfile']['name']);

    if ($isHasFile && !isset($error)) {
        $infoAboutFile = App::uploadFile($_FILES['imgfile'], $login . $_FILES['imgfile']['name']);

        if (isset($infoAboutFile['error'])) {
            $error = $infoAboutFile['error'];
        }
    }


    if (!isset($error)) {

        $params = [];

        if (isset($fields['password'])) {
            $password = Security::generatePassword($fields['password'], $fields['login']);
            $params[] = 'password=\'' . $fields['password'] . '\'';
            unset($fields['password']);
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


        $sql = 'UPDATE users SET ' . implode($params, ', ');

        if ($isHasFile) {
            $sql .= ', img_path =  \'' . $infoAboutFile['filename'] . '\'';
        }


        $sql .= ' WHERE login=?';

        $query = $db->prepare($sql);
        $query->bind_param('s', $_SESSION['login']);
        $query->execute();
        $_SESSION['login'] = $fields['login'];
    }
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


