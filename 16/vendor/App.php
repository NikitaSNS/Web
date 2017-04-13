<?php

class App
{
    public static function isAuth()
    {
        return isset($_SESSION['auth']);
    }

    public static function redirect($uri)
    {
        header('Location: ' . $uri . '.php');
        exit();
    }

    public static function render($templatePath, $variables = [])
    {
        extract($variables);

        $viewsPath = __DIR__ . '/../views/';

        include $viewsPath .'header.php';
        include $viewsPath . $templatePath . '.php';
        include $viewsPath .'footer.php';

        return true;
    }
 }