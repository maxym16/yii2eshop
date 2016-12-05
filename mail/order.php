<div class="table-responsive">
    <table style="width: 100%; border: 1px solid #ddd; border-collapse: collapse;" class="table table-hover table-striped">
    <thead>
      <tr style="background: #f9f9f9;">
        <th style="padding: 8px; border: 1px solid #ddd;">Назва</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Кількість</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Ціна</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Сума</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($session['cart'] as $id=>$item ) : ?>
      <tr>
        <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['name'] ?></td>
        <!--<? = \yii\helpers\Url::to(['product/view','id'=>$id],true) ?><!--адреса посилання на товар-->
        <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['qty'] ?></td>
        <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['price'] ?></td>
        <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['price']*$item['qty'] ?></td>
      </tr>
    <?php endforeach; ?>
      <tr>
        <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">Загалом</td>
        <td style="padding: 8px; border: 1px solid #ddd;"><?= $session['cart.qty'] ?></td>
      </tr>
      <tr>
        <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">На суму</td>
        <td style="padding: 8px; border: 1px solid #ddd;"><?= $session['cart.sum'] ?></td>
      </tr>
    </tbody>
  </table>    
</div>


