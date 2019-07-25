<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;
use vendor\core\base\View;

class MainController extends AppController {

    //public $layout = 'main';

    public function indexAction() {
        $model = new Main();
        echo $test;

/*        $posts = App::$app->cache->get('posts');
        if (!$posts) {
            $posts = \R::findAll('posts');
            App::$app->cache->set('posts', $posts);
        }*/
        $posts = \R::findAll('posts');
        $menu = $this->menu;
        $title = "Page title";
/*      $this->setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');
        $meta = $this->meta;*/
        View::setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');

        $this->set(compact('title', 'posts', 'menu', 'meta'));
    }

    public function testAction() {
        if ($this->isAjax()) {
            $model = new Main();
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));
            die();
        }
        echo 222;
        //$this->layout = 'test';
    }
}