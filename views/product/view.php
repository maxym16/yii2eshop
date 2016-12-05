<?php
use app\components\MenuWidget;
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\widgets\LinkPager;
?>
<section>
<div class="container">
    <div class="row">
	<div class="col-sm-3">
            <div class="left-sidebar">
            <h2>Category</h2>
            <ul class="catalog category-products" id = 'catalog'>
                <?= MenuWidget::widget(['tpl' => 'menu'])?>
            </ul>
				
            <div class="brands_products"><!--brands_products-->
		<h2>Brands</h2>
		<div class="brands-name">
		<ul class="nav nav-pills nav-stacked">
		<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
		<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
		<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
		<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
		<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
		<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
		<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
		</ul>
		</div>
            </div><!--/brands_products-->
						
            <div class="price-range"><!--price-range-->
		<h2>Price Range</h2>
		<div class="well">
                     <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                     <b>$ 0</b> <b class="pull-right">$ 600</b>
		</div>
            </div><!--/price-range-->
						
            <div class="shipping text-center"><!--shipping-->
		<img src="/images/home/shipping.jpg" alt="" />
            </div><!--/shipping-->
						
            </div>
	</div>
<?php //отримуємо головну картинку і галерею
$mainImg=$product->getImage();
$gallery=$product->getImages();
?>				
	<div class="col-sm-9 padding-right">
            <div class="product-details"><!--product-details-->
		<div class="col-sm-5">
                    <div class="view-product">
                    <!--<img src="/images/product-details/1.jpg" alt="" />-->
                    <!--<? = Html::img("@web/images/products/{$product->img}",['alt'=>$product->name,'class' => 'product-img'])?>-->
                    <?= Html::img($mainImg->getUrl(),['alt'=>$product->name,'class' => 'product-img'])?>
                <h3>ZOOM</h3>
                    </div>
                    <div id="similar-product" class="carousel slide" data-ride="carousel">
								
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
                        <?php $countg=count($gallery); $i=0; foreach($gallery as $img): ?>
                            <?php if($i%3==0): ?>
                            <div class="item <?php if($i==0) {echo ' active';}?>">
	                    <?php endif; ?>
				<a href="<?= Url::to(['product/view', 'id' => $product->id]);?>">
                            <?= Html::img($img->getUrl('85x84'),['alt'=>$product->name,'class' => 'product-img'])?>
                                </a>
                            <?php $i++; if($i%3==0 || $i==$countg): ?>
                            </div>
                            <?php endif; ?>
	                    <!--<div class="item">
                                <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
				<a href="<? = Url::to(['product/view', 'id' => $product->id]);?>">
                            <? = Html::img("@web/images/products/{$product->img}",['alt'=>$product->name,'class' => 'product-img'])?>
                                </a>
				<a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
                            </div>-->
        		<?php endforeach; ?>							
			</div>

			<!-- Controls -->
			<a class="left item-control" href="#similar-product" data-slide="prev">
			<i class="fa fa-angle-left"></i>
			</a>
			<a class="right item-control" href="#similar-product" data-slide="next">
			<i class="fa fa-angle-right"></i>
			</a>
                    </div>

		</div>
		<div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
			<!--<img src="/images/product-details/new.jpg" class="newarrival" alt="" />-->
                        <?php if($product->new) : ?>
                            <?= Html::img("@web/images/home/new.png", ['class' => 'new','alt'=>'Новинка']); ?>
                        <?php endif; ?>
                        <?php if($product->sale) : ?>
                            <?= Html::img("@web/images/home/sale.png", ['class' => 'new','alt'=>'Розпродаж']); ?>
                        <?php endif; ?>
			<h2><?= $product -> name?></h2>
			<p>Web ID: <?= $product->id ?></p>
			<img src="/images/product-details/rating.png" alt="" />
			<span>
			<span>US $<?= $product -> price?></span>
			<label>Quantity:</label>
                        <input type="text" value="1" id="qty"/>
                        <a href="<?= Url::to(['cart/add','id'=>$product->id]) ?>" data-id="<?= $product->id ?>" class="btn btn-default add-to-cart cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                            </a>
			</span>
			<p><b>Availability:</b> In Stock</p>
			<p><b>Condition:</b> New</p>
			<p><b>Brand:</b> E-SHOPPER</p>
                        <a href="<?= Url::to(['category/view', 'id' => $product->category->id]);?>">
                        <?=$product->category->name?></a>
                        <?= $product->content ?>
			<a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                    </div><!--/product-information-->
		</div>
            </div><!--/product-details-->
					
	<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>
	
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
<?php $count=count($products_hit); $i=0; foreach($products_hit as $hit): ?>
    <?php if( $i % 3 ==0): ?>
                    <div class="item <?php if($i==0) {echo 'active';} ?>">
    <?php endif; ?>                    
<?php //отримуємо головну картинку продукту
$mainImg=$hit->getImage();
?>				
			<div class="col-sm-4">
                            <div class="product-image-wrapper">
				<div class="single-products">
                                    <div class="productinfo text-center">
                                    <!--<img src="/images/home/recommend1.jpg" alt="" />-->
                                    <!--<? = Html::img("@web/images/products/{$hit->img}",['alt'=>$hit->name,'class' => 'product-img'])?>-->
                                    <?= Html::img($mainImg->getUrl(),['alt'=>$hit->name,'class' => 'product-img'])?>
					<h2>$<?= $hit->price; ?></h2>
                                        <p><a href="<?= Url::to(['product/view', 'id' => $hit->id]);?>"><?= $hit->name; ?></a></p>
					<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
				</div>
                            </div>
			</div>
    <?php $i++; if( $i%3==0 || $i==$count ): ?>
                    </div>
    <?php endif; ?>                    
<?php endforeach; ?>
                </div>
                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                    </a>			
            </div>
        </div><!--/recommended_items-->
					
    </div>
            </div>
	</div>
</section>


