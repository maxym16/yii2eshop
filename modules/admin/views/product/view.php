<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img=$model->getImage(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'category_id',
            [
            'attribute'=>'category_id',
            'value'=> 
                $model->category->name,
            ],
            'name',
            'content:ntext',//формат виведення даних,екранування html
//            'content:html',
            'price',
            'keywords',
            'description',
//            'img',
            [
            'attribute'=>'image',
            'value'=> "<img src='{$img->getUrl('150x')}'>",
            'format'=>'html',
            ],
//            'hit',
            [
            'attribute'=>'hit',
            'value'=> //якщо 'hit'=0 =>'Ні'
                !$model->hit ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>',
            'format'=>'html',
            ],
//            'new',
            [
            'attribute'=>'new',
            'value'=> //якщо 'new'=0 =>'Ні'
                !$model->new ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>',
            'format'=>'html',
            ],
//            'sale',
            [
            'attribute'=>'sale',
            'value'=> //якщо 'sale'=0 =>'Ні'
                !$model->sale ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>',
            'format'=>'html',
            ],
        ],
    ]) ?>

</div>
