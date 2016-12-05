<?php
/**
 * Created by NetBeans.
 * User: maxym16
 * Date: 24.11.2016
 * Time: 13:22
 */

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord{
    public static function tableName(){
        return 'product';
    }

    /**
     * поведінка для виведення картинок
     */
    public function behaviors(){
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id'  =>  'category_id']);
    }

}