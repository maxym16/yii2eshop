<?php
/**
 * Created by NetBeans.
 * User: maxym16
 * Date: 24.11.2016
 * Time: 15:22
 */
?>
<option value="<?= $category['id'] ?>" 
    <?php if($category['id']==$this->model->parent_id) {echo ' selected';} ?> 
    <?php if($category['id']==$this->model->id) {echo ' disabled';} ?>>
    <?= $tab.$category['name'] ?>
</option>
<?php if(isset($category['childs'])): ?>
    <ul>
        <?= $this->getMenuHtml($category['childs'],$tab.'----'); ?>
    </ul>
<?php endif; ?>

