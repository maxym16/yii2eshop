<?php
/**
 * Created by NetBeans.
 * User: maxym16
 * Date: 24.11.2016
 * Time: 13:22
 */
namespace app\controllers;

use yii\web\Controller;
/**
 * базовий контролер
 */
class AppController extends Controller{
    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content'=> "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content'=> "$description"]);
    }
}