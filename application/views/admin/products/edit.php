<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-lg-8"><h4 class="title">Edit product</h4></div>
                        <div class="col-lg-2 right">
                            <?php if(isset($itemData->id) && $itemData->id):?>
                                <a id="delete-product" href="/admin/product/delete"><button class="btn btn-default btn-block">Remove</button></a>
                            <?php else: ?>
                                <a id="delete-product" href="/admin/product/delete"><button class="btn btn-default btn-block">Remove</button></a>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-2 right">
                            <?php if(isset($itemData->id) && $itemData->id):?>
                                <a id="save-product" href="/admin/product/<?php echo $itemData->id;?>/save"><button class="btn btn-default btn-block">Save</button></a>
                            <?php else: ?>
                                <a id="save-product" href="/admin/product/new/save"><button class="btn btn-default btn-block">Save</button></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <form id="edit-product" action="" method="post">
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
                                        <input type="hidden" name="image" id="image" class="product-data" value="<?php echo $itemData->image;?>"/>
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
                                    <select name="brand" class="product-data">
                                        <option>Select brand...</option>
                                        <option name="brand_1">Test brand 1</option>
                                        <option name="brand_2">Test brand 2</option>
                                        <option name="brand_3">Test brand 3</option>
                                        <option name="brand_4">Test brand 4</option>
                                        <option name="brand_5">Test brand 5</option>
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
                                    <select name="brand" class="product-data">
                                        <option>Select color...</option>
                                        <option name="color_1">Test color 1</option>
                                        <option name="color_2">Test color 2</option>
                                        <option name="color_3">Test color 3</option>
                                        <option name="color_4">Test color 4</option>
                                        <option name="color_5">Test color 5</option>
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
