<?php
/**
 * Created by NetBeans.
 * User: maxym16
 * Date: 24.11.2016
 * Time: 13:22
 */

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord{
    public static function tableName(){
       return 'category';
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

    public function getProducts() {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

}