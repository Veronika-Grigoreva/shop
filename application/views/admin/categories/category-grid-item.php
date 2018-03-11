<ul>
    <?php foreach ($collection as $category): ?>
        <li>
            <span class="category-id">
                (id: <?php echo $category->id; ?>)
            </span>
            <?php echo $category->name; ?>
            <a href="/admin/category/<?php echo $category->id;?>">(EDIT)</a>
            <?php echo $this->load->view('admin/categories/category-grid-item', ['collection' => $category->children], TRUE);?>
        </li>
    <?php endforeach; ?>
</ul>