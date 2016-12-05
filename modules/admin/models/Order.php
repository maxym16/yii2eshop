<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "orderr".
 *
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $qty
 * @property double $sum
 * @property string $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 */
class Order extends ActiveRecord{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderr';
    }

    public function getOrderItems(){//одне замовлення до багатьох товарів
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }

     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'qty', 'sum', 'name', 'email', 'phone', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty'], 'integer'],
            [['sum'], 'number'],
            [['status'], 'string'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ замовлення',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата зміни',
            'qty' => 'Кількість',
            'sum' => 'Сума',
            'status' => 'Статус',
            'name' => "Ім'я",
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адреса',
        ];
    }
}
