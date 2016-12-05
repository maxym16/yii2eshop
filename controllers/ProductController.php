<?php

namespace app\controllers;

use app\models\Product;
use yii\web\HttpException;
use Yii;

/**
 * Description of ProductController
 *
 * @author Maxym
 */
class ProductController extends AppController{
    public function actionView($id) {
        //$id = Yii::$app -> request -> get('id');//отримуємо id із запиту GET- 2-й спосіб
        $product = Product::findOne($id);//ледаче завантаження
        if(empty($product)){
            throw new HttpException(404,'Такого товару не існує. Product Not Found.');
        }
//        $product = Product::find() ->with('category')->where(['id'=>$id])->limit(1)->one();//жадібне завантаження
//        $product = Product::find()->where(['=', 'id', $id])->with('category')->limit(1)->all()[0];

        $this->setMeta('E-SHOPPER | '.mb_convert_case($product->name, 0),$product->keywords, $product->description);
        $products_hit = Product::find()->where(['=', 'hit', '1'])->limit(6)->all();
        return $this->render('view',compact('product','products_hit'));
    }
}
