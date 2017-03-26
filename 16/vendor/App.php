<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 26.03.2017
 * Time: 15:50
 */
class App
{
    public function __construct()
    {
        $this->initialize();
    }

    public function initialize()
    {
        session_start();
    }

    public function isFormAction()
    {
        return isset($_POST['submit']);
    }

    public function handleForm()
    {

    }

    public function isAuth()
    {
        return isset($_SESSION['login']);
    }

    public function auth($login)
    {
        $_SESSION['login'] = $login;
    }

    public function render($path)
    {
        include $this->getTemplatesDir() . $path . '.php';
    }

    public function renderHeader()
    {
        $this->render('header');
    }

    public function renderFooter()
    {
        $this->render('footer');
    }

    public static function asset($assetPath)
    {
        return 'public/' . $assetPath;
    }

    public function getRootDir()
    {
        return __DIR__ . '/../';
    }

    public function getTemplatesDir()
    {
        return $this->getRootDir() . 'templates/';
    }
}