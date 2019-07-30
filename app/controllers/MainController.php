<?php

namespace app\controllers;

use app\models\Main;
use myFramework\core\App;
use myFramework\core\base\View;
use myFramework\libs\Pagination;

class MainController extends AppController {

    //public $layout = 'main';

    public function indexAction() {
        $model = new Main();

        $lang = App::$app->getProperty('lang')['code'];
        $total = \R::count('posts', 'lang_code =?', [$lang]);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;

        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

/*        $posts = App::$app->cache->get('posts');
        if (!$posts) {
            $posts = \R::findAll('posts');
            App::$app->cache->set('posts', $posts);
        }*/

        $posts = \R::findAll('posts', " lang_code=? LIMIT $start, $perpage", [$lang]);
        $menu = $this->menu;
        $title = "Page title";
/*      $this->setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');
        $meta = $this->meta;*/
        View::setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');

        $this->set(compact('title', 'posts', 'menu', 'meta', 'pagination', 'total'));
    }

    public function testAction() {
        if ($this->isAjax()) {
            $model = new Main();
            /*$data = ['answer' => 'Ответ с сервера', 'code' => 200];
            echo json_encode($data);*/
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));
            die();
        }
        echo 222;
        //$this->layout = 'test';
    }
}