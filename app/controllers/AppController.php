<?php


namespace app\controllers;

use app\models\Main;

class AppController extends \vendor\core\base\Controller {

    public $menu;
    public $meta = [];

    public function __construct($route)
    {
        parent::__construct($route);
/*        if ($this->route['action'] == 'test') {
            echo "<h1>TEST</h1>";
        }*/
        new Main();
        $this->menu = \R::findAll('category');
    }

    protected function setMeta($title = '', $desc = '', $keywords = '') {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

}