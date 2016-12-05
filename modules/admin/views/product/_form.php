<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);
//use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <!--<? php echo $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name')) ?>-->
    <!--<? = $form->field($model, 'category_id')->textInput(['maxlength' => true]) ?>-->
<div class="form-group field-product-category_id required has-success">
<label class="control-label" for="product-category_id">Категорія</label>
<select id="product-category_id" class="form-control" name="Product[category_id]">
    <?= app\components\MenuWidget::widget(['tpl'=>'select_product','model'=>$model]) ?>
</select>
</div>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!--<? = $form->field($model, 'content')->textarea(['rows' => 6]) ?>-->
    <!--<? php 
    echo $form->field($model, 'content')->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //розроблені стандартні налаштування basic,standard,full; цю можливість не обов'язково використовувати
        'inline' => false, //по замовчанню false
    ],
    ]);
    ?>-->
    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
    'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);    
    ?>
    
    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>
    <?= $form->field($model,'gallery[]')->fileInput(['multiple'=>true,'accept'=>'image/*']) ?>

    <?= $form->field($model, 'hit')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'new')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'sale')->checkbox([ '0', '1', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
