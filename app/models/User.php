<?php

namespace app\models;

use myFramework\core\base\Model;

class User extends Model {

    public $attributes = [
        'name' => '',
        'login' => '',
        'email' => '',
        'password' => '',
    ];

    public $rules = [
        'required' => [
            ['name'],
            ['login'],
            ['email'],
            ['password'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6],
        ]
    ];

    public function checkUnique() {
        $user = \R::findOne('user', 'login =? OR email =? LIMIT 1', [$this->attributes['login'], $this->attributes['email']]);
        if ($user) {
            if ($user->login == $this->attributes['login']) {
                $this->errors['unique'][] = 'Этот логин уже занят';
            }
            if ($user->email== $this->attributes['email']) {
                $this->errors['unique'][] = 'Этот email уже занят';
            }
        return false;
        }
        return true;
    }

}