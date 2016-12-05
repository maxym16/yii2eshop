<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Замовлення №'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Перегляд замовлення №<?= $model -> id ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
            'attribute'=>'status',
            'value'=> !$model->status ? '<span class="text-danger">Активне</span>' : '<span class="text-success">Завершено</span>',
            'format'=>'html',
            ],
//            'status',
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>
<?php $items=$model->orderItems; ?>
<div class="table-responsive">
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>Назва</th>
        <th>Кількість</th>
        <th>Ціна</th>
        <th>Сума</th>
      </tr>
    </thead>
    <tbody>
    <?php $summa=0; ?>  
    <?php foreach($items as $item ) : ?>
      <tr>
        <td><a href="<?= Url::to(['/product/view', 'id' => $item->product_id]);?>"><?= $item['name'] ?></a></td>
        <td><?= $item['qty_item'] ?></td>
        <td><?= $item['price'] ?></td>
        <td><?= $item['sum_item'] ?></td>
      </tr>
    <?php $summa=$summa+$item['sum_item']; ?>  
    <?php endforeach; ?>
      <tr>
        <td colspan="3">На суму</td>
        <td><?= $summa; ?></td>
      </tr>
    </tbody>
  </table>    
</div>
    
</div>
