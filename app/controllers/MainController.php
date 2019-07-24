<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController {

    //public $layout = 'main';

    public function indexAction() {
        //App::$app->getList();
        $model = new Main();
        $posts = \R::findAll('posts');
        $menu = $this->menu;
        $title = "Page title";
        $this->setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');
        $meta = $this->meta;
        $this->set(compact('title', 'posts', 'menu', 'meta'));
    }

    public function testAction() {
        $this->layout = 'test';
    }
}