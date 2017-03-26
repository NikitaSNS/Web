<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 26.03.2017
 * Time: 18:29
 */
class AccountController extends Controller
{
    public function indexAction()
    {
        if (isset($_SESSION['auth'])) {
            $this->redirect('news');
        }

        if (isset($_POST['submit'])) {
            $db = Database::getInstance()->getConnection();
            $login = $_POST['login'];
            $password = $_POST['password'];


            $query = $db->prepare('SELECT * FROM users WHERE login=? AND `password`=?');
            $query->bind_param("ss", $login, $password);
            $query->execute();
            $result = $query->get_result()->fetch_assoc();
            if ($result !== null) {
                $_SESSION['auth'] = true;
                $_SESSION['login'] = $login;

                $this->redirect('news');
            }
        }

        return $this->render('forms/login');
    }

    public function newsAction()
    {
        if (!isset($_SESSION['auth'])) {
            $this->redirect('login');
        }

        return $this->render('forms/profile');
    }

    public function logoutAction()
    {
        $_SESSION = [];
        session_destroy();
    }
}