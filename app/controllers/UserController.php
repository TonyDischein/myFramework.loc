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
            if ($user->validate($data)) {
                echo 'ok';
            } else {
                echo 'No';
            }
            die;
        }
        View::setMeta('Регистрация');
    }

    public function loginAction() {

    }

    public function logoutAction() {

    }

}