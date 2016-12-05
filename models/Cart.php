<?php

namespace app\models;
use yii\db\ActiveRecord;
/**
 * Description of Cart
 *
 * @author Maxym
 */
class Cart extends ActiveRecord{
    
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
    
    public function addToCart($product,$qty=1){
        $mainImg=$product->getImage();//завантажуємо головну картинку
        if(isset($_SESSION['cart'][$product->id])){//якщо в сесії вже існує елемент $product->id
            $_SESSION['cart'][$product->id]['qty']+=$qty;//збільшимо qty на $qty 
        } else {//створимо в кошику масив з товаром
            $_SESSION['cart'][$product->id]=[
                'qty' => $qty,
                'name'=> $product->name,
                'price'=> $product->price,
                //'img'=> $product->img
                'img'=> $mainImg->getUrl()
                //'img'=>$mainImg->getUrl('x50')
            ];
        }
        //загальна кількість товарів в сесії кошика
        $_SESSION['cart.qty']=isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
        //загальна ціна товарів в сесії кошика
        $_SESSION['cart.sum']=isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
        
    }
    
    public function recalc($id){
        if(!isset($_SESSION['cart'][$id])){//якщо в сесії не існує елементa $id
            return false;
        }
        $qtyMinus=$_SESSION['cart'][$id]['qty'];
        $sumMinus=$_SESSION['cart'][$id]['qty']*$_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty']-=$qtyMinus;
        $_SESSION['cart.sum']-=$sumMinus;
        //видаляємо позицію товара в кошику
        unset($_SESSION['cart'][$id]);
    }
}
