<?php

namespace app\modules\admin;
//use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * перенесли з OrderController.php
     */
/*    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
*/    
    /**
     * перенесли з AppAdminController.php
     */
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,//дозволяємо всі дії
                        'roles' => ['@'],//тільки для авторизованих користувачів
                    ],
                ],
            ],
        ];
    }
    
}
