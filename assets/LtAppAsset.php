<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Maxym
 */
class LtAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [//if lt IE 9
    'js/html5shiv.js',
    'js/respond.min.js',
    ];
    public $jsOptions = [//скрипти підключаються за умови
        'condition' => 'lt IE 9',
        'position' => \yii\web\View::POS_HEAD,
    ];
}
