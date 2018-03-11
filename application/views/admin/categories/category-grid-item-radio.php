<ul>
    <?php foreach ($collection as $category): ?>
        <li>
            <?php if ($parrentCategoryId == $category->id): ?>
                <input type="radio" checked="checked" name="parent_category_id" value="<?php echo $category->id;?>">
            <?php elseif ($currentCategoryId == $category->id): ?>
                <input type="radio" disabled name="parent_category_id" value="<?php echo $category->id;?>">
            <?php else: ?>
                <input type="radio" name="parent_category_id" value="<?php echo $category->id;?>">
            <?php endif; ?>
            <?php echo $category->name; ?>
            <?php echo $this->load->view('admin/categories/category-grid-item-radio', ['collection' => $category->children], TRUE);?>
        </li>
    <?php endforeach; ?>
</ul>