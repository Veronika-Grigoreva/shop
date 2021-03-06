<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-lg-8"><h4 class="title">Edit product</h4></div>
                        <div class="col-lg-2 right">
                            <?php if(isset($itemData->id) && $itemData->id):?>
                                <a id="delete-product" href="/admin/product/<?php echo $itemData->id;?>/delete"><button class="btn btn-default btn-block">Remove</button></a>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-2 right">
                            <?php if(isset($itemData->id) && $itemData->id):?>
                                <a id="save-admin-form" href="/admin/product/<?php echo $itemData->id;?>/save"><button class="btn btn-default btn-block">Save</button></a>
                            <?php else: ?>
                                <a id="save-admin-form" href="/admin/product/new/save"><button class="btn btn-default btn-block">Save</button></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <form id="admin-edit" action="" method="post">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Name*</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?php if(isset($itemData->name) && $itemData->name):?>
                                        <input type="text" class="form-control border-input product-data" name="name" placeholder="Name" value="<?php echo $itemData->name; ?>">
                                    <?php else: ?>
                                        <input type="text" class="form-control border-input product-data" name="name" placeholder="Name" value="">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Description</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?php if(isset($itemData->description) && $itemData->description):?>
                                        <textarea rows="5" class="form-control border-input product-data" name="description" placeholder="Here can be your description" value="Mike"><?php echo $itemData->description; ?></textarea>
                                    <?php else: ?>
                                        <textarea rows="5" class="form-control border-input product-data" name="description" placeholder="Here can be your description" value="Mike"></textarea>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Image</label>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="form-group">
                                    <div id="uploadfile" class="dropzone">
                                        <?php if (isset($itemData->image)):?>
                                            <input type="hidden" name="image" id="image" class="product-data" value="<?php echo $itemData->image;?>"/>
                                        <?php else: ?>
                                            <input type="hidden" name="image" id="image" class="product-data" value=""/>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    <!--                        <div class="row">-->
    <!--                            <div class="col-md-3">-->
    <!--                                <div class="form-group">-->
    <!--                                    <label>Additional images</label>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-9">-->
    <!--                                <div class="form-group">-->
    <!---->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Price*</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?php if(isset($itemData->price) && $itemData->price):?>
                                        <input type="text" class="form-control border-input product-data" name="price" value="<?php echo $itemData->price; ?>">
                                    <?php else: ?>
                                        <input type="text" class="form-control border-input product-data" name="price" value="0">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Discount</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?php if(isset($itemData->sale) && $itemData->sale):?>
                                        <input type="text" class="form-control border-input product-data" name="sale" value="<?php echo $itemData->sale; ?>">
                                    <?php else: ?>
                                        <input type="text" class="form-control border-input product-data" name="sale" value="0">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Brand</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <select name="id_brand" class="product-data">
                                        <option value="">Select brand...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Colour</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <select name="id_colour" class="product-data">
                                        <option value="">Select color...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Categories</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <ul class="categories-list">
                                        <?php foreach($additionalInfo['categories'] as $category1): ?>
                                            <li>
                                                <?php if ($category1->checked): ?>
                                                    <input type="checkbox" name="categories[]" value="<?php echo $category1->id; ?>" checked="<?php echo $category1->checked; ?>">
                                                <?php else:?>
                                                    <input type="checkbox" name="categories[]" value="<?php echo $category1->id; ?>">
                                                <?php endif;?>

                                                <?php echo $category1->name; ?>
                                            </li>

                                            <ul>
                                                <?php foreach($category1->children as $category2): ?>
                                                    <li>
                                                        <?php if ($category2->checked): ?>
                                                            <input type="checkbox" name="categories[]" value="<?php echo $category2->id; ?>" checked="<?php echo $category2->checked; ?>">
                                                        <?php else:?>
                                                            <input type="checkbox" name="categories[]" value="<?php echo $category2->id; ?>">
                                                        <?php endif;?>

                                                        <?php echo $category2->name; ?>
                                                    </li>

                                                    <ul>
                                                        <?php foreach($category2->children as $category3): ?>
                                                            <li>
                                                                <?php if ($category3->checked): ?>
                                                                    <input type="checkbox" name="categories[]" value="<?php echo $category3->id; ?>" checked="<?php echo $category3->checked; ?>">
                                                                <?php else:?>
                                                                    <input type="checkbox" name="categories[]" value="<?php echo $category3->id; ?>">
                                                                <?php endif;?>

                                                                <?php echo $category3->name; ?>
                                                            </li>
                                                        <?php endforeach;?>
                                                    </ul>
                                                <?php endforeach;?>
                                            </ul>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
