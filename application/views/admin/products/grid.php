<div class="content">
    <div class="alert alert-success">
        <span><b> Success - </b> This is a regular notification made with ".alert-success"</span>
    </div>
    <div class="alert alert-danger">
        <span><b> Danger - </b> This is a regular notification made with ".alert-danger"</span>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-9"><h4 class="title">Products Grid</h4></div>
                            <div class="col-lg-3">
                                <a href="/admin/product/"><button class="btn btn-default btn-block">Add new product</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Price with discount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($gridCollection as $item):?>
                                    <tr>
                                        <td> <?php echo $item->id; ?></td>
                                        <td> <img class="product-grid-image" src="<?php echo $item->image; ?>"></td>
                                        <td> <?php echo $item->name; ?></td>
                                        <td> <?php echo $item->price; ?></td>
                                        <td> <?php echo $item->sale; ?>%</td>
                                        <td> <?php echo $item->newprice; ?></td>
                                        <td> <a href="/admin/product/<?php echo $item->id; ?>">Edit</a></td>
                                    </tr>
                                <?php endforeach;?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
