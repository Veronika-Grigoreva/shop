<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-lg-8"><h4 class="title">Edit category</h4></div>
                        <div class="col-lg-2 right">
                            <?php if(isset($itemData->id) && $itemData->id):?>
                                <a id="delete-product" href="/admin/category/<?php echo $itemData->id;?>/delete"><button class="btn btn-default btn-block">Remove</button></a>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-2 right">
                            <?php if(isset($itemData->id) && $itemData->id):?>
                                <a id="save-admin-form" href="/admin/category/<?php echo $itemData->id;?>/save"><button class="btn btn-default btn-block">Save</button></a>
                            <?php else: ?>
                                <a id="save-admin-form" href="/admin/category/new/save"><button class="btn btn-default btn-block">Save</button></a>
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
                                    <label>Parent Category*</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <ul>
                                        <li>
                                            <input type="radio" checked="checked" name="parent_category_id" value="NULL" />
                                            Root
                                            <?php echo $itemData->parentCategoryHtml; ?>
                                        </li>
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
