<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController {

    //public $layout = 'main';

    public function indexAction() {
        //App::$app->getList();
        \R::fancyDebug(true);
        $model = new Main();

        $posts = App::$app->cache->get('posts');
        if (!$posts) {
            $posts = \R::findAll('posts');
            App::$app->cache->set('posts', $posts);
        }

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