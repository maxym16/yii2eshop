<?php

namespace app\components;

use yii\base\Widget;
use app\models\Category;
use Yii;

class MenuWidget extends Widget{
    public $tpl;
    public $model;//для роботи з моделлю Category
    public $data;//зберігає всі записи category з БД
    public $tree;//перероблений масив $data в дерево
    public $menuHtml;//Html-код в залежності від $tpl

    public function init(){
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';//add розширення .php
    }

    public function run(){
        //return $this->tpl;
        //відключимо кешування для адмінки
        if($this->tpl=='menu.php'){
        // get cache перевіряємо чи є дані в кеші
        $menu = Yii::$app->cache->get('menu');
        if ($menu){ return $menu;}
        }
        //зчитуємо як масив,i робимо,щоби ключ===id
        $this->data = Category::find()->indexBy('id')->asArray()->all();
        //перероблений масив $data в дерево
        $this->tree = $this->getTree();
        //debug($this->tree);
        //отримуємо Html-код в залежності від $tpl
        $this->menuHtml = $this->getMenuHtml($this->tree);

        //відключимо кешування для адмінки
        if($this->tpl=='menu.php'){
        //add to cache
        Yii::$app->cache->set('menu', $this->menuHtml, 60);
        }
        return $this->menuHtml;
        
    }

    protected function getTree(){
        // Разбиває масив категорій на дерево відносно параметру parent_id
        $tree = [];
        foreach ($this->data as $id => &$node){
            if (!$node['parent_id'])
            { $tree[$id] = &$node;}
            else
            { $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;}
        }
        return $tree;
    }

    protected function getMenuHtml($tree,$tab=''){
        $str = '';
        foreach ($tree as $category){
            $str .= $this->catToTemplate($category,$tab);
        }
        return $str;
    }

    protected function catToTemplate($category,$tab){
        ob_start(); // Буферизацiя
        include __DIR__ . '/menu_tpl/' . $this->tpl;//без виведення на екран
        return ob_get_clean();
    }

}