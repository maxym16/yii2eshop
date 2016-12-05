<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="container">
<!--Повідомлення чи успішно прийняті дані в моделі -->
<?php if( Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif;?>
<?php if( Yii::$app->session->hasFlash('error') ): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif;?>
<?php if(!empty($session['cart'])) : ?>
<div class="table-responsive">
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>Фото</th>
        <th>Назва</th>
        <th>Кількість</th>
        <th>Ціна</th>
        <th>Сума</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($session['cart'] as $id=>$item ) : ?>
      <tr>
        <!--<td><? = Html::img("@web/images/products/{$item['img']}", ['alt'=>$item['name'],'height'=>60]) ?></td>-->
        <td><?= Html::img($item['img'], ['alt'=>$item['name'],'height'=>60]) ?></td>
        <td><a href="<?= Url::to(['product/view', 'id' => $id]);?>"><?= $item['name'] ?></a></td>
        <td><?= $item['qty'] ?></td>
        <td><?= $item['price'] ?></td>
        <td><?= $item['price']*$item['qty'] ?></td>
      </tr>
    <?php endforeach; ?>
      <tr>
        <td colspan="4">Загалом</td>
        <td><?= $session['cart.qty'] ?></td>
      </tr>
      <tr>
        <td colspan="4">На суму</td>
        <td><?= $session['cart.sum'] ?></td>
      </tr>
    </tbody>
  </table>    
</div>
<hr/>
<h2>Ваші дані</h2>
<?php $form = ActiveForm::begin() ?>
<?= $form->field($order,'name') ?>
<?= $form->field($order,'email') ?>
<?= $form->field($order,'phone') ?>
<?= $form->field($order,'address') ?>
<?= Html::submitButton('Замовити',['class'=>'btn btn-success']) ?>
<?php ActiveForm::end() ?>
<?php else : ?><h3>Кошик порожній(Cart is empty).</h3> 
<?php endif; ?>
</div>
