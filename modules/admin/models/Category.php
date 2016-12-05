<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $parent_id
 * @property string $name
 * @property string $keywords
 * @property string $description
 */
class Category extends ActiveRecord{
    /**
     * з якою таблицею працюємо
     */
    public static function tableName()
    {
        return 'category';
    }
    
    /**
     * для зміни виведення колонки Parent ID
     * зв'язок таблиці із самою собою
     */
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id'=>'parent_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ категорії',
            'parent_id' => 'Батьківська категорія',
            'name' => 'Назва',
            'keywords' => 'Ключові слова',
            'description' => 'Мета-опис',
        ];
    }
}
