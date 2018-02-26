<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="/" data-animate-hover="bounce">
                <img src="/img/logo.png" alt="Obaju logo" class="hidden-xs">
                <img src="/img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="cart">
                    <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="/">Home</a>
                </li>
                <li class="dropdown yamm-fw">
                    <?php foreach ($categories as $value): ?>
                    <?php if ($value->parent_category_id == NULL && $value->id == 1): ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200"><?php echo $value->name; ?><b class="caret"></b></a>
                    <?php endif;?>
                    <?php endforeach;?>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <?php foreach ($categories as $value): ?>
                                        <?php if ($value->parent_category_id == 1 && $value->id == 3): ?>
                                        <h5><?php echo $value->name; ?></h5>
                                        <ul>
                                            <?php foreach ($categories as $value): ?>
                                            <?php if ($value->parent_category_id == 3): ?>
                                            <li><a href="category"><?php echo $value->name; ?></a>
                                            </li>
                                            <?php endif;?>
                                            <?php endforeach;?>
                                        </ul>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="banner">
                                            <a href="#">
                                                <img src="img/banner.jpg" class="img img-responsive" alt="">
                                            </a>
                                        </div>
                                        <div class="banner">
                                            <a href="#">
                                                <img src="img/banner2.jpg" class="img img-responsive" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>

                <li class="dropdown yamm-fw">
                    <?php foreach ($categories as $value): ?>
                    <?php if ($value->parent_category_id == NULL && $value->id == 2): ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200"><?php echo $value->name; ?><b class="caret"></b></a>
                    <?php endif;?>
                    <?php endforeach;?>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <?php foreach ($categories as $value): ?>
                                        <?php if ($value->parent_category_id == 2 && $value->id == 4): ?>
                                        <h5><?php echo $value->name; ?></h5>
                                        <ul>
                                            <?php foreach ($categories as $value): ?>
                                            <?php if ($value->parent_category_id == 4): ?>
                                            <li><a href="category"><?php echo $value->name; ?></a>
                                            </li>
                                            <?php endif;?>
                                            <?php endforeach;?>
                                        </ul>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                        </div>
                        <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="cart" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->
<!---->
<!-- *** NAVBAR END *** -->