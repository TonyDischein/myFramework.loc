<?php

namespace app\controllers;

class Main extends App {

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