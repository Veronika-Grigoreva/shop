    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-9"><h4 class="title">Categories</h4></div>
                            <div class="col-lg-3">
                                <a href="/admin/category/new"><button class="btn btn-default btn-block">Add new category</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <div id="categories-grid-block">
                            <?php echo $gridCollectionHtml;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>