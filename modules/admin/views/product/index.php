<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'category_id',
            [
            'attribute'=>'category_id',
            'value'=> function($data){
                return $data->category->name;
            },
            ],
            
            'name',
            //'content:ntext',
            'price',
            // 'keywords',
            // 'description',
            // 'img',
            // 'hit',
            [
            'attribute'=>'hit',
            'value'=> function($data){//якщо 'hit'=0 =>'Ні'
                return !$data->hit ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>';
            },
            'format'=>'html',
            ],
            // 'new',
            [
            'attribute'=>'new',
            'value'=> function($data){//якщо 'new'=0 =>'Ні'
                return !$data->new ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>';
            },
            'format'=>'html',
            ],
            // 'sale',
            [
            'attribute'=>'sale',
            'value'=> function($data){//якщо 'sale'=0 =>'Ні'
                return !$data->sale ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>';
            },
            'format'=>'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
