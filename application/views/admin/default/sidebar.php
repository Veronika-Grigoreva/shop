<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    <?php echo $adminData['login']; ?>
                </a>
            </div>

            <ul class="nav">
                <li id="dashboard">
                    <a href="/admin">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li id="orders">
                    <a href="/admin/orders">
                        <i class="ti-shopping-cart-full"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li id="products">
                    <a href="/admin/products">
                        <i class="ti-package"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li id="categories">
                    <a href="/admin/categories">
                        <i class="ti-view-list-alt"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li id="users">
                    <a href="icons.html">
                        <i class="ti-user"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
