<link rel="stylesheet" href="../../../assets/css/shared/header.css">

<header class="header">

    <div class="container-fluid">

        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="../home_page/index.php"><img src="../../../assets/images/header/logo.png"
                    alt="" class="logo"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="cart">

                <ul class="header_sidebar_right">
                    <li class="shop_search">
                        <a href="#"><i class="fas fa-search"></i></a>
                    </li>
                    <li class="shop_heart">
                        <a href="#"><i class="far fa-heart"></i></a>
                    </li>
                    <li class="shop_cart">
                        <a href="#"><i class="fas fa-cart-plus"></i></a>
                    </li>
                    <li class="shop_cart">
                        <a href="#" data-toggle="modal" data-target="#loginFormModel"><i class="far fa-user"></i></a>
                    </li>
                </ul>
            </div>



            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../home_page/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../product_page/index.php">Book</a>
                    </li>
                    <!-- <li class="nav-item">
            <a class="nav-link" href="/views/contact_page/">Pages</a>
          </li>          -->

                    <li class="nav-item">
                        <a class="nav-link" href="../about_page/index.php">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=../contact_page/index.php>Contact</a>
                    </li>

                </ul>
            </div>

        </nav>

    </div>

</header>




<div class="modal fade" id="loginFormModel" tabindex="-1" role="dialog" aria-labelledby="loginFormModelLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginFormModelLabel">Login</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>
</div>