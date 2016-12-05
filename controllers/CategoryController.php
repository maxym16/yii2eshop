<?php
/**
 * Created by NetBeans.
 * User: maxym16
 * Date: 24.11.2016
 * Time: 13:22
 */
namespace app\controllers;

use app\models\Category;
use app\models\Product;
use yii\web\HttpException;
use yii\data\Pagination;
use Yii;

class CategoryController extends AppController{
    public function actionIndex(){
//        $this->view->title="Home";
//        $hits = Product::find()->where([ 'hit'=> '1'])->limit(6)->all();
//        return $this->render('index',compact('hits'));
        $this->setMeta('E-SHOPPER');
        $products_hit = Product::find()->where(['=', 'hit', '1'])->limit(6)->all();
        return $this->render('index', compact('products_hit'));
    }

    public function actionView(){
        $id = Yii::$app->request->get('id');//отримуємо id із запиту GET <- 2-й спосіб
        $category = Category::findOne(['=', 'id', $id]);
        if(empty($category)){
            throw new HttpException(404,'Такої категорії не існує. Category Not Found.');
        }
        //отримуємо об'єкт для підрахунку кількості записів
        $query = Product::find()->where(['category_id' => $id]);

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize'   => 3,//скільки на сторінку
            'forcePageParam' => false,
            'pageSizeParam'  => false,
        ]);
        //робимо запит починаючи з певного об'єкту
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta('E-SHOPPER | '.mb_convert_case($category->name, 0), $category->keywords, $category->description);

        return $this->render('view', compact('products', 'category', 'pages'));
    }

    public function actionSearch(){
        $search = trim(Yii::$app->request->get('search'));//отримуємо id із запиту GET 
        $this->setMeta('E-SHOPPER | Пошук: '.mb_convert_case($search, 0));
        if(!$search){
            return $this->render('search',  compact('search'));
        }
        //отримуємо об'єкт для підрахунку кількості записів
        $query = Product::find()->where(['like','name',$search]);

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize'   => 3,//скільки на сторінку
            'forcePageParam' => false,
            'pageSizeParam'  => false,
        ]);
        //робимо запит починаючи з певного об'єкту
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', compact('products', 'search', 'pages'));
    }
    
}