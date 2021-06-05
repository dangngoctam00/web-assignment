<?php
require "../../data/config.php";
session_start();
if (!$_SESSION['id']) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <!-- Page plugins -->
    <?php include('./include/stylesheet.php'); ?>
    <?php include('./include/script.php'); ?>
    <link rel="stylesheet" href="../../assets/css/admin/navbar.css">
</head>

<body style="overflow: unset;">
    <!-- Side bar -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom sticky-top">
        <a class="navbar-brand" href="index.php">
            <img src="../../assets/images/admin/book_brand.png" width="30" height="30" class="d-inline-block align-top"
                alt="">
            Bookstore4T
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="navbar-nav mx-auto">
                <form class="nav-item form-inline">
                    <input class="form-control mr-2" style="width:40vw;" type="search"
                        placeholder="Looking for a product?" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="navbar-nav ml-auto">
                <div class="nav-item dropdown mr-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle" alt="Image placeholder" src="../../assets/images/admin/avatar.jpg"
                            width="30" height="30">
                        <span class="mb-0" style="color: aliceblue;">
                            <?php
                            echo $_SESSION["first_name"];
                            ?>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cog"></i>
                            <span class="nav-link-text">Settings</span>
                        </a>
                        <a class="dropdown-item" href="./logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="nav-link-text">Logout</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-12 bg-dark mt-0 min-vh-100 d-flex flex-column">
                <nav class="left_nav_bar navbar navbar-dark sticky-top" style="top: 60px;">
                    <ul class="navbar-nav" id="leftNavbar">
                        <li class="nav-item">
                            <a class="left_bar_link nav-link" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>
                                <span class="nav-link-text ml-4">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="left_bar_link nav-link" href="product.php">

                                <i class="fas fa-book"></i>
                                <span class="nav-link-text ml-4">Product</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="left_bar_link nav-link active" href="customer.php">

                                <i class="fas fa-user-alt"></i>

                                <span class="nav-link-text ml-4">Customer</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="left_bar_link nav-link" href="employee.php">
                                <i class="fas fa-user-friends" aria-hidden="true"></i>
                                <span class="nav-link-text ml-4">Employee</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="left_bar_link nav-link" href="contact.php">
                                <i class="fas fa-comment"></i>
                                <span class="nav-link-text ml-4">Contact</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-10 col-12">
                <div class="row">
                    <div class="col-lg-3 col-6 my-3 d-flex align-items-stretch">
                        <div class="card card-stats bg-success">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total products</h5>
                                        <div class="h2 font-weight-bold mb-0 text-center">
                                            <?php
                                            $query = "select count(*) as total from book";

                                            $result = $mysql_db->query($query);
                                            $row = $result->fetch_assoc();
                                            echo $row['total'];
                                            ?> </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape text-dark rounded-circle ">
                                            <i class="fas fa-book"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-dark mr-2"><i class="fa fa-arrow-up"></i>
                                        0.00%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6 my-3 d-flex align-items-stretch">
                        <div class="card card-stats bg-info">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total customers</h5>
                                        <div class="h2 font-weight-bold mb-0 text-center">
                                            <?php
                                            $query = "select count(*) as total from customer";

                                            $result = $mysql_db->query($query);
                                            $row = $result->fetch_assoc();
                                            echo $row['total'];
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape text-dark rounded-circle ">
                                            <i class="fas fa-user-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-dark mr-2"><i class="fa fa-arrow-up"></i>
                                        0.00%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6 my-3 d-flex align-items-stretch">
                        <div class="card card-stats bg-light">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total employees</h5>
                                        <div class="h2 font-weight-bold mb-0 text-center">
                                            <?php
                                            $query = "select count(*) as total from employee";

                                            $result = $mysql_db->query($query);
                                            $row = $result->fetch_assoc();
                                            echo $row['total'];
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape text-dark rounded-circle ">
                                            <i class="fas fa-user-friends" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-dark mr-2"><i class="fa fa-arrow-up"></i>
                                        0.00%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6 my-3 d-flex align-items-stretch">
                        <div class="card card-stats bg-warning">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total contacts</h5>
                                        <div class="h2 font-weight-bold mb-0 text-center">
                                            <?php
                                            $query = "select count(*) as total from send_email_log";

                                            $result = $mysql_db->query($query);
                                            $row = $result->fetch_assoc();
                                            echo $row['total'];
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape text-dark rounded-circle ">
                                            <i class="fas fa-comment"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-dark mr-2"><i class="fa fa-arrow-up"></i>
                                        0.00%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>