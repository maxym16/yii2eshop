<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
class Orderr extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderr';
    }

    public function behaviors(){
        return [
            [//заповнюємо оголошені поля('created_at','updated_at') міткою часу
                'class' => TimestampBehavior::className(),
                'attributes' => [//коли спрацьовує поведінка
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                //якщо замість мітки часу UNIX використовується datetime:
                'value' => new Expression('NOW()'),                
            ],
        ];
    }

        public function getOrderItems(){
        return $this->hasMany(OrderItems::className(), ['order_id'=>'id']);
    }

        /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['qty'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['sum'], 'number'],
            [['status'], 'boolean'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => "Ім'я",
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адреса',
        ];
    }
}
