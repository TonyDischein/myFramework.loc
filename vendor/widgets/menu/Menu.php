<?php

namespace vendor\widgets\menu;

class Menu {
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container;
    protected $table;
    protected $cache;

    public function __construct() {
        $this->run();
    }

    protected function run() {
        $this->data = \R::getAssoc("SELECT * FROM categories");
        $this->tree = $this->getTree();
        echo $this->menuHtml = $this->getMenuHtml($this->tree);
        //debug($this->tree);
    }

    protected function getTree() {
        $tree = [];
        $data = $this->data;

        foreach ($data as $id=>&$node) {
            if (!$node['parent']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '') {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id) {
        ob_start();
        require __DIR__ . '/menu_tpl/menu.php';
        return ob_get_clean();
    }
}