<?php

namespace app\controllers;

class MainController extends AppController {

    //public $layout = 'main';

    public function indexAction() {
        //$this->layout = false;
        /*$this->layout = 'main';
        $this->view = 'test';*/
        $testVar = "testValue";
        $title = "Page title";
        $this->set(compact('testVar', 'title'));
    }

}