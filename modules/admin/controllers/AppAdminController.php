<?php

namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * Description of AppAdminController
 *
 * @author Maxym
 */
class AppAdminController extends Controller{
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
