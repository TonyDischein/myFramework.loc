<?php


namespace app\controllers;

use app\models\Main;

class AppController extends \vendor\core\base\Controller {

    public $menu;

    public function __construct($route)
    {
        parent::__construct($route);
        new Main();
        $this->menu = \R::findAll('category');
    }

}