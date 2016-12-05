<?php use yii\helpers\Html; ?>
<?php if(!empty($session['cart'])) : ?>
<div class="table-responsive">
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>Фото</th>
        <th>Назва</th>
        <th>Кількість</th>
        <th>Ціна</th>
        <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($session['cart'] as $id=>$item ) : ?>
      <tr>
        <!--<td><? = Html::img("@web/images/products/{$item['img']}", ['alt'=>$item['name'],'height'=>60]) ?></td>-->
        <td><?= Html::img($item['img'], ['alt'=>$item['name'],'height'=>60]) ?></td>
        <td><?= $item['name'] ?></td>
        <td><?= $item['qty'] ?></td>
        <td><?= $item['price'] ?></td>
        <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
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
<?php else : ?><h3>Кошик порожній(Cart is empty).</h3> 
<?php endif; ?>


