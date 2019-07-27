<?php

namespace app\controllers\admin;

use myFramework\core\base\View;

class UserController extends AppController {

    //public $layout = 'default';

    public function indexAction() {
        View::setMeta('Админка|Главная страница', 'Описание админки', 'Ключевики админки');

        $test = 'Тестовая переменная';
        $data = ['test', '3'];

        /*$this->set([
            'test' => $test,
            'data' => $data,
        ]);*/

        $this->set(compact('test', 'data'));
    }

    public function testAction() {
        //$this->layout = 'test';
    }
}