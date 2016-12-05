<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends ActiveRecord{
    public $image;//замість поля img таблиці product БД
    public $gallery;//для галереї картинок


    /**
     * вставляємо картинки
     */
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * зв'язок з моделлю Category 1 до 1 
     */
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id'=>'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],//завантажуємо не більше 4-х файлів
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товара',
            'category_id' => 'Категорія',
            'name' => 'Назва',
            'content' => 'Опис',
            'price' => 'Ціна',
            'keywords' => 'Ключові слова',
            'description' => 'Мета-опис',
            'image' => 'Фото',
            'gallery' => 'Галерея(.png,.jpg, до 4 картинок)',
            'hit' => 'Хіт',
            'new' => 'Новинка',
            'sale' => 'Розпродаж',
        ];
    }
    
    public function upload(){
        if($this->validate()){
            $path='upload/store/'.$this->image->baseName.'.'.$this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path,true);//прикріплюємо картинку до товару,записуємо в image БД,true-головне зображення
            @unlink($path);//видаляємо,@ - щоби не видно було помилок
            return true;
        } else {
            return false;
        }
    }
    public function uploadGallery(){
        if($this->validate()){
            foreach ($this->gallery as $file){
                $path='upload/store/'.$file->baseName.'.'.$file->extension;
                $file->saveAs($path);
                $this->attachImage($path);//прикріплюємо картинку до товару,записуємо в image БД
                @unlink($path);//видаляємо,@ - щоби не видно було помилок
            }
            return true;
        } else {
            return false;
        }
    }
}
