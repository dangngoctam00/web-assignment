<?php
require "../../data/config.php";
session_start();
if (!$_SESSION['id_admin']) {
    header("Location: login.php");
}
// Get all customer information
$query = "SELECT * FROM customer";
$result = $mysql_db->query($query);
$customers = array();
while ($item = mysqli_fetch_assoc($result)) {
    $customers[] = $item;
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
    <link rel="stylesheet" href="../../assets/css/admin/customer.css">
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 id="titleTable">
                                    Customer
                                </h3>
                            </div>
                            <div class="card-content">

                                <table class="table-stripped">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Birthday</th>
                                        <th>Register At</th>
                                        <th>Active</th>
                                        <th>Password</th>
                                        <th></th>
                                        <th></th>
                                    </tr>

                                    <?php foreach ($customers as $customer) { ?>

                                    <tr>
                                        <td><?php echo $customer['id']; ?></td>
                                        <td><?php echo $customer['name']; ?></td>
                                        <td><?php echo $customer['email']; ?></td>
                                        <td><?php echo $customer['phone']; ?></td>
                                        <td><?php echo $customer['birthdate']; ?></td>
                                        <td><?php echo $customer['registered_at']; ?></td>
                                        <td><?php echo $customer['active']; ?></td>
                                        <td><button class="btn btn-primary" data-toggle="modal"
                                                data-target="#customerEditModal<?php echo $customer['id']; ?>">Edit</button>
                                        </td>
                                        <td><button class="btn btn-danger"
                                                onclick="deleteCustomer(<?php echo $customer['id']; ?> , '<?php echo $customer['email']; ?>')">Delete</button>
                                        </td>
                                    </tr>

                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Edit Customer -->
    <?php foreach ($customers as $customer) { ?>
    <div class="modal fade" id="customerEditModal<?php echo $customer['id']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="customerModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Edit Customer Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="id-edit-<?php echo $customer['id']; ?>"
                                class="col-2 col-form-label"><strong>ID</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="<?php echo $customer['id']; ?>"
                                    id="id-edit-<?php echo $customer['id']; ?>" disabled>
                            </div>
                            <span class="text-danger" id="idErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="name-edit-<?php echo $customer['id']; ?>"
                                class="col-2 col-form-label"><strong>Name</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="<?php echo $customer['name']; ?>"
                                    id="name-edit-<?php echo $customer['id']; ?>">
                            </div>
                            <span class="text-danger" id="nameErr"></span>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="email-edit-<?php echo $customer['id']; ?>"
                                class="col-2 col-form-label"><strong>Email</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="email" value="<?php echo $customer['email']; ?>"
                                    id="email-edit-<?php echo $customer['id']; ?>">
                                <input class="form-control" type="email" value="<?php echo $customer['email']; ?>"
                                    id="original-email-edit-<?php echo $customer['id']; ?>" hidden>
                            </div>
                            <span class="text-danger" id="emailErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="phone-edit-<?php echo $customer['id']; ?>"
                                class="col-2 col-form-label"><strong>Phone</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="<?php echo $customer['phone']; ?>"
                                    id="phone-edit-<?php echo $customer['id']; ?>">
                            </div>
                            <span class="text-danger" id="phoneErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="birthday-edit-<?php echo $customer['id']; ?>"
                                class="col-2 col-form-label"><strong>Birthday</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="date" value="<?php echo $customer['birthdate']; ?>"
                                    id="birthday-edit-<?php echo $customer['id']; ?>">
                            </div>
                            <span class="text-danger" id="birthdayErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="register_at-edit-<?php echo $customer['id']; ?>"
                                class="col-2 col-form-label"><strong>Register At</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text"
                                    value="<?php echo $customer['registered_at']; ?>"
                                    id="register_at-edit-<?php echo $customer['id']; ?>" disabled>
                            </div>
                            <span class="text-danger" id="register_atErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="active-edit-<?php echo $customer['id']; ?>"
                                class="col-2 col-form-label"><strong>Active</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="<?php echo $customer['active']; ?>"
                                    id="active-edit-<?php echo $customer['id']; ?>">
                            </div>
                            <span class="text-danger" id="activeErr"></span>
                        </div>

                        <!-- <span class="text-danger" id="activeErr"></span> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="editCustomer(<?php echo $customer['id']; ?>)">Save changes</button>
                </div>
            </div> 
        </div>
    </div>
    <?php } ?>

    <script>
    // Delete Customer
    function deleteCustomer(customer_id, customer_email) {
        if (confirm("DELETE this Customer?")) {
            $.post(
                "post/customer_func.php", {
                    action: "delete_customer",
                    id: customer_id,
                    email: customer_email
                },
                function(data, status) {
                    alert(data);
                    if (data == "Delete Customer SUCCESSFULLY!")
                        window.location.href = "customer.php";
                }
            );
        }
    }


    function editCustomer(customer_id) {
        var id = $("#id-edit-" + customer_id).val();
        var name = $("#name-edit-" + customer_id).val();
        var email = $("#email-edit-" + customer_id).val();
        var originalEmail = $("#original-email-edit-" + customer_id).val();
        var phone = $("#phone-edit-" + customer_id).val();
        var birthday = $("#birthday-edit-" + customer_id).val();
        var register_at = $("#register_at-edit-" + customer_id).val();
        var active = $("#active-edit-" + customer_id).val();
        $.post(
            "post/customer_func.php", {
                action: "edit_customer",
                id: id,
                name: name,
                email: email,
                originalEmail: originalEmail,
                phone: phone,
                birthday: birthday,
                register_at: register_at,
                active: active,
            },
            function(data, status) {
                alert(data);
                if (data == "Update Customer Information SUCCESSFULLY!")
                    window.location.href = "customer.php";
            }
        );
    }
    </script>
</body>

</html>