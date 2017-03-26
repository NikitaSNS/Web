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
            $this->redirect('profile');
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

                $this->redirect('profile');
            }
        }

        return $this->render('forms/login');
    }

    public function profileAction()
    {
        if (!isset($_SESSION['auth'])) {
            $this->redirect('login');
        }

        if (isset($_POST['submit'])) {
            $db = Database::getInstance()->getConnection();

            $query = $db->prepare('SELECT * FROM users WHERE login=? AND `password`=?');
            $query->bind_param("ss", $login, $password);
            $query->execute();
            $result = $query->get_result()->fetch_assoc();
            if ($result !== null) {
                $_SESSION['auth'] = true;
                $_SESSION['login'] = $login;

                $this->redirect('profile');
            }
        }

        return $this->render('forms/profile', [
            'title' => 'Профиль',
        ]);
    }

    public function logoutAction()
    {
        $_SESSION = [];
        session_destroy();

        $this->redirect('login');
    }
}