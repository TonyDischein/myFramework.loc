<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController {

    //public $layout = 'main';

    public function indexAction() {
        $model = new Main();
        $posts = $model->findAll();
        $post = $model->findOne(2);
        debug($post);
        $title = "Page title";
        $this->set(compact('title', 'posts'));
    }

}