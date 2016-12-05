<?php
/**
 * Created by NetBeans.
 * User: maxym16
 * Date: 24.11.2016
 * Time: 15:22
 */
?>
<li>
    SELECT<a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']]); ?>">
        <?= $category['name'] ?>
        <?php if(isset($category['childs'])): ?>
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        <?php endif; ?>
    </a>
    <?php if(isset($category['childs'])): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs']); ?>
        </ul>
    <?php endif; ?>
</li>
