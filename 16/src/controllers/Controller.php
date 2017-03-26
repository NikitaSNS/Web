<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 26.03.2017
 * Time: 19:11
 */
abstract class Controller
{
    protected function render($templatePath)
    {
        $viewsPath = ROOT . '/src/views/';

        include $viewsPath .'header.php';
        include $viewsPath . $templatePath . '.php';
        include $viewsPath .'footer.php';

        return true;
    }

    protected function redirect($uri)
    {
        header('Location: ' . $uri);
        exit();
    }

}