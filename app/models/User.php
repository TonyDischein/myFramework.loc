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

}