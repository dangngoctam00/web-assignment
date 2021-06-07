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
                        <a href="../cart/"><i class="fas fa-cart-plus"></i></a>
                    </li>
                    <?php 
                        // print "<script>alert('ac')</script>";
                      
                        if (!empty($_SESSION['email'])) {
                            print "<li class='shop_cart'>
                                        <a href='../account_page/index.php'><i class='fa fa-user'></i></a>
                                    </li>";
                        }
                        else {
                            print "<li class='shop_cart'>
                                        <a href='../authenticate/login.php'><i class='fa fa-user'></i></a>
                                    </li>";
                        }
                    ?>
                    
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