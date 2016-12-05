<?php

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\Orderr;
use app\models\OrderItems;
use Yii;
/**
 * Description of CartController
 * @author Maxym
 */
class CartController extends AppController{
    /**
     * додавання товарів в кошик
     */
    public function actionAdd(){
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');//кількість приходить зі сторінки продуктів
        //перевіримо чи число записане в qty
        //якщо не число => $qty=1
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if(empty($product)){return false;}
        $session = Yii::$app->session;
        $session->open();//відкриваємо сесію
        $cart = new Cart();
        $cart->addToCart($product,$qty);
        //якщо це не Ajax-запит => переходимо на статичну сторінку кошика 
        if(!Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        }
        //убираємо шаблон
        $this->layout = false;
        //повертаємо сесію в вид
        return $this->render('cart-modal',  compact('session'));
    }
    
    /**
     * очищення кошика
     */
    public function actionClear(){
        $session = Yii::$app->session;
        $session->open();//відкриваємо сесію
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        //убираємо шаблон
        $this->layout = false;
        //передаємо в вид
        return $this->render('cart-modal',  compact('session'));
    }

    /**
     * видалення конкретної позиції в кошику
     */
    public function actionDelItem(){
        $id = Yii::$app->request->get('id');//отримуємо id товара
        $session = Yii::$app->session;
        $session->open();//відкриваємо сесію
        $cart = new Cart();
        $cart->recalc($id);
        //убираємо шаблон
        $this->layout = false;
        //передаємо в вид
        return $this->render('cart-modal',  compact('session'));
    }
    
    /**
     * показ кошика
     */
    public function actionShow(){
        $session = Yii::$app->session;
        $session->open();//відкриваємо сесію
        //убираємо шаблон
        $this->layout = false;
        //передаємо в вид
        return $this->render('cart-modal',  compact('session'));
    }
    
    /**
     * Оформлення замовлення
     */
    public function actionView(){
        //беремо кошик із сесії
        $session = Yii::$app->session;
        $session->open();//відкриваємо сесію
        $this->setMeta('E-SHOPPER | Кошик');
        $order = new Orderr();
        //якщо ми передали дані із замовлення(методом post),кнопка"Замовити"
        if($order->load(Yii::$app->request->post())){
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            //якщо замовлення збережено
            if($order->save()){
                //передаємо кошик і id замовлення
                $this->saveOrderItems($session['cart'], $order->id);
                //flash-повідомлення
                Yii::$app->session->setFlash('success',"Ваше замовлення прийнято. Невдовзі менеджер з Вами зв'яжеться.");
                //підготуємо лист в виді /mail/layouts/order.php
                Yii::$app->mailer->compose('order',['session'=>$session])
                    ->setFrom(['ga@meta.ua'=>'yii2eshop'])//від кого реально,щоби не викинулось в спам, i що додатково побачить замовник
                    //->setFrom('ga@meta.ua')//від кого реально
                    //->setTo($order->email)//кому(замовник)
                    ->setTo([$order->email,Yii::$app->params['adminEmail']])//кому(замовник)+admin(дублюємо лист для адміна)
                    //->setTo(Yii::$app->params['adminEmail'])//кому(admin-у),з ф-ла /config/params.php
                    ->setSubject('Замовлення')//тема
                    //->setHtmlBody('<b>текст повідомлення в форматі HTML</b>')
                    //->setTextBody('Текст повідомлення')//якщо відправляю текстовий лист
                    ->send();
                //очистимо кошик
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();//перезавантажуємо сторінку
            } else {
                Yii::$app->session->setFlash('error',"Помилка оформлення замовлення.");
            }
        }
        return $this->render('view', compact('session','order'));
    }
    
    protected function saveOrderItems($items,$order_id){
        foreach($items as $id=>$item){
            //для кожного запису створюємо свій об'єкт
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['price']*$item['qty'];
            $order_items->save();
        }
    }
}
