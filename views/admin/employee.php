<?php
require "../../data/config.php";
session_start();
if (!$_SESSION['id_admin']) {
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
            <img src="../../assets/images/admin/book_brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Bookstore4T
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="navbar-nav mx-auto">
                <form class="nav-item form-inline">
                    <input class="form-control mr-2" style="width:40vw;" type="search" placeholder="Looking for a product?" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="navbar-nav ml-auto">
                <div class="nav-item dropdown mr-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle" alt="Image placeholder" src="../../assets/images/admin/avatar.jpg" width="30" height="30">
                        <span class="mb-0" style="color: aliceblue;">
                            <?php
                            echo $_SESSION["first_name"];
                            ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cog"></i>
                            <span class="nav-link-text">Change avatar</span>
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
                            <a class="left_bar_link nav-link" href="transaction.php">
                                <i class="fas fa-money-check-alt"></i>
                                <span class="nav-link-text ml-4">Transaction</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="left_bar_link nav-link" href="customer.php">

                                <i class="fas fa-user-alt"></i>

                                <span class="nav-link-text ml-4">Customer</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="left_bar_link nav-link active" href="employee.php">
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

                <!-- start code     -->
                <div class="row">
                    <div class="col-12">
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-outline-primary mx-3" data-toggle="modal" data-target="#staffModal">Add new employee</button>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h3 id="titleTable">
                                    All Employees
                                </h3>
                            </div>
                            <div class="card-content">
                                <table class="table table-striped table-hover table-responsive-lg" style="table-layout:fixed;">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bold table-primary">ID</th>
                                            <th class="font-weight-bold table-primary">Full name</th>
                                            <th class="font-weight-bold table-primary">Work as</th>
                                            <th class="font-weight-bold table-primary">Link avatar</th>
                                            <th class="font-weight-bold table-primary">Link facebook</th>
                                            <th class="font-weight-bold table-primary">Link twitter</th>
                                            <th class="font-weight-bold table-primary">Link instagram</th>
                                            <th class="font-weight-bold table-primary"></th>
                                            <th class="font-weight-bold table-primary"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php



                                        $sql = "SELECT * from employee";
                                        $res = $mysql_db->query($sql);
                                        $employ = array();
                                        while ($row = $res->fetch_assoc()) {
                                            array_push($employ, array($row['id'], $row['full_name'], $row['work_as'], $row['link_image'], $row['link_facebook'], $row['link_twitter'], $row['link_instagram']));

                                        ?>
                                            <tr>
                                                <td> <?php echo $row['id'] ?> </td>
                                                <td> <?php echo $row['full_name'] ?> </td>
                                                <td> <?php echo $row['work_as'] ?> </td>
                                                <td> <?php echo $row['link_image'] ?> </td>
                                                <td> <?php echo $row['link_facebook'] ?> </td>
                                                <td> <?php echo $row['link_twitter'] ?> </td>
                                                <td> <?php echo $row['link_instagram'] ?> </td>


                                                <td> <button class="btn btn-primary" data-toggle="modal" data-target="#staffEditModal<?php echo $row['id'] ?>">Edit</button>
                                                </td>
                                                <td> <button class="btn btn-danger" onclick="deleteEmployee(<?php echo $row['id'] ?>)">Delete</button>
                                                </td>
                                                </td>

                                            </tr>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- modal add new employee -->
    <div class="modal fade" id="staffModal" tabindex="-1" role="dialog" aria-labelledby="staffModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add new employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="name" class="col-2 col-form-label"><strong>Full name</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="name">
                            </div>
                            <span class="text-danger" id="nameErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="profile" class="col-2 col-form-label"><strong>Work as</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="work">
                            </div>
                            <span class="text-danger" id="workErr"></span>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="email" class="col-2 col-form-label"><strong>Link avatar</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="email" value="" id="avatar">
                            </div>
                            <span class="text-danger" id="avatarErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="phone" class="col-2 col-form-label"><strong>Link facebook</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="face">
                            </div>
                            <span class="text-danger" id="faceErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="html" class="col-2 col-form-label"><strong>Link twitter</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="twitter">
                            </div>
                            <span class="text-danger" id="twitterErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="html" class="col-2 col-form-label"><strong>Link instagram</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="insta">
                            </div>
                            <span class="text-danger" id="instaErr"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addEmployee()">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- edit employee -->
    <?php
    for ($index = 0; $index < count($employ); $index++) {
    ?>

        <div class="modal fade" id="staffEditModal<?php echo $employ[$index][0]; ?>" tabindex="-1" role="dialog" aria-labelledby="staffEditModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Edit employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row align-items-center">
                                <label for="id-edit-<?php echo $employ[$index][0]; ?>" class="col-2 col-form-label"><strong>ID</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $employ[$index][0]; ?>" id="id-edit-<?php echo $employ[$index][0]; ?>" disabled>
                                </div>
                                <span class="text-danger" id="idErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="name-edit-<?php echo $employ[$index][0]; ?>" class="col-2 col-form-label"><strong>Full name</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $employ[$index][1]; ?>" id="name-edit-<?php echo $employ[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="nameErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="work-edit-<?php echo $employ[$index][0]; ?>" class="col-2 col-form-label"><strong>Work as</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $employ[$index][2]; ?>" id="work-edit-<?php echo $employ[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="workErr"></span>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="avatar-edit-<?php echo $employ[$index][0]; ?>" class="col-2 col-form-label"><strong>Link avatar</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $employ[$index][3]; ?>" id="avatar-edit-<?php echo $employ[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="avatarErr"></span>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="face-edit-<?php echo $employ[$index][0]; ?>" class="col-2 col-form-label"><strong>Link facebook</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $employ[$index][4]; ?>" id="face-edit-<?php echo $employ[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="faceErr"></span>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="twitter-edit-<?php echo $employ[$index][0]; ?>" class="col-2 col-form-label"><strong>Link twitter</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $employ[$index][5]; ?>" id="twitter-edit-<?php echo $employ[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="twitterErr"></span>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="insta-edit-<?php echo $employ[$index][0]; ?>" class="col-2 col-form-label"><strong>Link instagram</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $employ[$index][3]; ?>" id="insta-edit-<?php echo $employ[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="instaErr"></span>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="editEmployee(<?php echo $employ[$index][0]; ?>)">Edit</button>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>


    <script>
        // edit employee
        function editEmployee(employ_id) {
            var id = document.getElementById("id-edit-" + employ_id).value;
            var fname = document.getElementById("name-edit-" + employ_id).value;
            var work = document.getElementById("work-edit-" + employ_id).value;
            var avatar = document.getElementById("avatar-edit-" + employ_id).value;
            var face = document.getElementById("face-edit-" + employ_id).value;
            var twitter = document.getElementById("twitter-edit-" + employ_id).value;
            var insta = document.getElementById("insta-edit-" + employ_id).value;
            //console.log(id + " " + fname + " "+work+" "+avatar+" "+face+" "+twitter+" "+insta);
            $.post(
                "post/employee_func.php", {
                    action: "edit_employee",
                    id: id,
                    fname: fname,
                    work: work,
                    avatar: avatar,
                    face: face,
                    twitter: twitter,
                    insta: insta
                },
                function(data, status) {
                    alert(data);
                    if (data == "Change employee information successfully!") window.location.href = "employee.php";
                }
            );
        }

        // delete employee
        function deleteEmployee(employ_id) {
            $.post(
                "post/employee_func.php", {
                    action: "delete_employee",
                    id: employ_id
                },
                function(data, status) {
                    alert(data);
                    if (data == "Delete employee information successfully!") window.location.href = "employee.php";
                }
            );
        }

        // add employee
        function addEmployee() {
            var fname = document.getElementById("name").value;
            var work = document.getElementById("work").value;
            var avatar = document.getElementById("avatar").value;
            var face = document.getElementById("face").value;
            var twitter = document.getElementById("twitter").value;
            var insta = document.getElementById("insta").value;
            $.post(
                "post/employee_func.php", {
                    action: "add_employee",
                    fname: fname,
                    work: work,
                    avatar: avatar,
                    face: face,
                    twitter: twitter,
                    insta: insta
                },
                function(data, status) {
                    alert(data);
                    if (data == "Add employee information successfully!") window.location.href = "employee.php";
                }
            );
        }
    </script>



</body>

</html>