<?php

namespace app\controllers;

use app\models\User;
use myFramework\core\base\View;

class UserController extends AppController {

    public function signupAction() {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if ($user->save('user')) {
                $_SESSION['saccess'] = 'Вы зарегестрированы';
            } else {
                $_SESSION['error'] = 'Ошибка! Попробуйте позже';
            }
            redirect();
        }
        View::setMeta('Регистрация');
    }

    public function loginAction() {
        if (!empty($_POST)) {
            $user = new User();
            if ($user->login()) {
                $_SESSION['saccess'] = 'Вы авторизованы';
                redirect('/');
            } else {
                $_SESSION['error'] = 'Логин или пароль введены не верно!';
                redirect();
            }
        }
        View::setMeta('Вход');
    }

    public function logoutAction() {
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect('/user/login');
    }

}