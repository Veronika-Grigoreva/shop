<div class="container" id="login-form-container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title center">Login to admin panel</h4>
                </div>
                <div class="content">
                    <form action="/admin/loginPost" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Login</label>
                                    <input name="login" type="text" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control border-input">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Login</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <?php if(!empty($errors)): ?>
            <p class="text-danger center">
                <?php echo $errors['message'];?>
            </p>
        <?php endif;?>
    </div>
</div>