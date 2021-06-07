<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
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
    <style>
        *:focus {
            outline: 0 !important;
        }
        .readmore-btn {
            border: none;
            color: teal;
            font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            font-weight: 600;
            font-size: 1rem;
            outline: none;
        }
    </style>
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
                            <a class="left_bar_link nav-link active" href="product.php">

                                <i class="fas fa-book"></i>
                                <span class="nav-link-text ml-4">Product</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="left_bar_link nav-link" href="customer.php">

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


                <!-- start code -->
                <div class="row">
                    <div class="col-12">
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-outline-primary mx-3" data-toggle="modal"
                                data-target="#bookModal">Add new book</button>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h3 id="titleTable">
                                    All Books
                                </h3>
                            </div>
                            <div class="card-content">
                                <table class="table table-striped table-hover table-responsive-lg"
                                    style="table-layout:fixed;">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bold table-primary">Book ID</th>
                                            <th class="font-weight-bold table-primary">Name</th>
                                            <th class="font-weight-bold table-primary">Author</th>
                                            <th class="font-weight-bold table-primary">Category</th>
                                            <th class="font-weight-bold table-primary">Price</th>
                                            <th class="font-weight-bold table-primary">Description</th>
                                            <th class="font-weight-bold table-primary">Image URL</th>
                                            <th class="font-weight-bold table-primary"></th>
                                            <th class="font-weight-bold table-primary"></th>
                                            <th class="font-weight-bold table-primary"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php



                                        $sql = "SELECT * from book";
                                        $res = $mysql_db->query($sql);
                                        $book = array();
                                        while ($row = $res->fetch_assoc()) {
                                            array_push($book, array($row['id'], $row['name'], $row['category'], $row['price'], $row['description'], $row['link_image'], $row['published_at'], $row['is_bestseller']));

                                        ?>

                                        <?php
                                            $long_description = $row['description'];
                                            $short_description = substr($long_description, 0, strpos($long_description, '.'));                            
                                            // echo "<script>alert('$short_description')</script>";
                                            $left_description = substr($long_description, strpos($long_description, '.'));
                                            $b_id = $row['id'];
                                            $author_query = "select author from written_by where book_id = $b_id";
                                            $authors = $mysql_db->query($author_query);
                                            $author = array();
                                            while($a = $authors->fetch_assoc()) {
                                                $author[] = $a['author'];
                                            }
                                            $author = implode(', ', $author);
                                        ?>
                                        <tr>
                                            <td> <?php echo $row['id'] ?> </td>
                                            <td> <?php echo $row['name'] ?> </td>
                                            <td> <?php echo $author ?> </td>
                                            <td> <?php echo $row['category'] ?> </td>
                                            <td> <?php echo $row['price'] ?> </td>                                            
                                            <td> 
                                                
                                                <?php echo $short_description ?> 
                                                <span  class="dots">...</span>
                                                <span style="display: none;" class="more"><?php echo $left_description ?></span>
                                                <button class="readmore-btn">Read more</button>
                                            
                                        
                                        
                                            </td>
                                            <td> <?php echo $row['link_image'] ?> </td>                                            

                                            <td><button class="btn btn-info" data-toggle="collapse" 
                                                data-target="#comment<?php echo $row['id'] ?>" aria-expanded="false"
                                                aria-controls="comment<?php echo $row['id'] ?>">View comment</button>
                                            </td>

                                            <td> <button class="btn btn-primary" style="padding-left: 40px; padding-right: 40px" data-toggle="modal"
                                                    data-target="#bookEditModal<?php echo $row['id'] ?>">Edit</button>
                                            </td>
                                            <td> <button class="btn btn-danger"  style="padding-left: 30px; padding-right: 30px"
                                                    onclick="deleteBook(<?php echo $row['id'] ?>)">Delete</button>
                                            </td>                                            

                                        </tr>

                                        <?php
                                            $sql1 = "SELECT book_id, customer_id, quality, date_review, content FROM reviewed_by WHERE book_id = ?";
                                            $stmt1 = $mysql_db->prepare($sql1);
                                            $stmt1->bind_param("i", $row['id']);
                                            $stmt1->execute();
                                            $stmt1->store_result();
                                            $stmt1->bind_result($book_id, $customer_id, $quality, $date_review, $content);
                                            // $id = $row['id'];
                                            // echo "<script>alert('$book_id' + '/' + '$id')</script>"
                                        ?>
                                        <tr>
                                            <th colspan="9">
                                                <div class="card collapse" id="comment<?php echo $row['id']; ?>">
                                                    <div class="card-header">
                                                        <h3 id="titleTable">
                                                            Review
                                                        </h3>
                                                    </div>
                                                    <div class="card-content">
                                                        <table class="table-stripped">
                                                            <tr>
                                                                <th>Book ID</th>
                                                                <th>Customer ID</th>
                                                                <th>Quality</th>
                                                                <th>Time</th>
                                                                <th>Content</th>
                                                                <th></th>
                                                            </tr>
                                                            <?php
                                                            while ($stmt1->fetch()) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $book_id; ?></td>
                                                                    <td><?php echo $customer_id; ?></td>
                                                                    <td><?php echo $quality; ?></td>
                                                                    <?php
                                                                         $date = explode(' ', $date_review)[0];
                                                                         $date = new DateTime($date);
                                                                         $date = $date->format('d-m-Y');
                                                                    ?>
                                                                    <td><?php echo $date; ?></td>
                                                                    <td><?php echo $content; ?></td>
                                                                    <?php $combineID = $book_id . "." . "$customer_id"?>
                                                                    <td><button class="btn btn-danger" onclick="deleteReview(<?php echo $combineID; ?>)">Delete</button></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </th>
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
    <div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="bookModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add new book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="name" class="col-2 col-form-label"><strong>Name</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="new-name">
                            </div>
                            <span class="text-danger" id="nameErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="name" class="col-2 col-form-label"><strong>Author</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="new-author">
                            </div>
                            <span class="text-danger" id="authorErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="profile" class="col-2 col-form-label"><strong>Category</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="new-category">
                            </div>
                            <span class="text-danger" id="categoryErr"></span>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="email" class="col-2 col-form-label"><strong>Price</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="email" value="" id="new-price">
                            </div>
                            <span class="text-danger" id="priceErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="phone" class="col-2 col-form-label"><strong>Description</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="new-description">
                            </div>
                            <span class="text-danger" id="descriptionErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="html" class="col-2 col-form-label"><strong>Image URL</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="new-image">
                            </div>
                            <span class="text-danger" id="imageErr"></span>
                        </div>                       
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addBook()">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- edit employee -->
    <?php
    for ($index = 0; $index < count($book); $index++) { 
        // echo "<script> alert('$index') </script>";       
    ?>
    

    <div class="modal fade" id="bookEditModal<?php echo $book[$index][0]; ?>" tabindex="-1" role="dialog"
        aria-labelledby="bookEditModal" aria-hidden="true">
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
                            <label for="book-id-edit-<?php echo $book[$index][0]; ?>"
                                class="col-2 col-form-label"><strong>ID</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="<?php echo $book[$index][0]; ?>"
                                    id="book-id-edit-<?php echo $book[$index][0]; ?>" disabled>
                            </div>
                            <span class="text-danger" id="idErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="book-name-edit-<?php echo $book[$index][0]; ?>"
                                class="col-2 col-form-label"><strong>Name</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="<?php echo $book[$index][1]; ?>"
                                    id="book-name-edit-<?php echo $book[$index][0]; ?>">
                            </div>
                            <span class="text-danger" id="nameErr"></span>
                        </div>
                        <?php
                            $b_id = $book[$index][0];
                            $author_query = "select author from written_by where book_id = $b_id";
                            $authors = $mysql_db->query($author_query);
                            $author = array();
                            while($a = $authors->fetch_assoc()) {
                                $author[] = $a['author'];
                            }
                            $author = implode(', ', $author);
                        ?>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="book-name-edit-<?php echo $book[$index][0]; ?>"
                                class="col-2 col-form-label"><strong>Author</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="<?php echo $author ?>"
                                    id="book-author-edit-<?php echo $book[$index][0]; ?>">
                            </div>
                            <span class="text-danger" id="nameErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="book-category-edit-<?php echo $book[$index][0]; ?>"
                                class="col-2 col-form-label"><strong>Category</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="<?php echo $book[$index][2]; ?>"
                                    id="book-category-edit-<?php echo $book[$index][0]; ?>">
                            </div>
                            <span class="text-danger" id="workErr"></span>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="book-price-edit-<?php echo $book[$index][0]; ?>"
                                class="col-2 col-form-label"><strong>Price</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="<?php echo $book[$index][3]; ?>"
                                    id="book-price-edit-<?php echo $book[$index][0]; ?>">
                            </div>
                            <span class="text-danger" id="avatarErr"></span>
                        </div>
                        
                        <div class="form-group row align-items-center">
                            <label for="book-description-edit-<?php echo $book[$index][0]; ?>"
                                class="col-2 col-form-label"><strong>Description</strong></label>
                            <div class="col-10">                                
                                <textarea rows="20" class="form-control" type="text" value="<?php echo $book[$index][4] ?>"
                                    id="book-description-edit-<?php echo $book[$index][0]; ?>"><?php echo $book[$index][4] ?></textarea>                            
                            </div>
                            <span class="text-danger" id="faceErr"></span>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="book-image-edit-<?php echo $book[$index][0]; ?>"
                                class="col-2 col-form-label"><strong>Image URL</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="<?php echo $book[$index][5]; ?>"
                                    id="book-image-edit-<?php echo $book[$index][0]; ?>">
                            </div>
                            <span class="text-danger" id="twitterErr"></span>
                        </div>                       
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="editBook(<?php echo $book[$index][0]; ?>)">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
    ?>


    <script>



        $('.readmore-btn').click(function(event) {
            
            let dots = $('.dots');
            let moreText = $('.more');
            let btnText = $('.readmore-btn');
        
            if (dots.css('display') === 'none') {
                dots.css('display', 'inline');
                btnText.html('Read more');
                moreText.css('display', 'none');
            } else {
                dots.css('display', 'none');
                btnText.html('Read less');
                moreText.css('display', 'inline');
            }
        });

        // edit employee
        function editBook(book_id) {
            let id = document.getElementById("book-id-edit-" + book_id).value;
            let name = document.getElementById("book-name-edit-" + book_id).value;
            let author = document.getElementById("book-author-edit-" + book_id).value;
            let category = document.getElementById("book-category-edit-" + book_id).value;
            let price = document.getElementById("book-price-edit-" + book_id).value;
            let description = document.getElementById("book-description-edit-" + book_id).value;
            let image = document.getElementById("book-image-edit-" + book_id).value;
            author = author.split(', ');
            // alert(author);
            // alert(id + " " + name + " "+ author +" "+ category +" "+ price +" "+ description+" "+image);
            $.post(
                "post/book_function.php", {
                    action: "edit_book",
                    id,
                    name,
                    author,
                    category,
                    price,
                    description,
                    image
                },
                function(data, status) {
                    alert(data);
                    if (data == "Change book information successfully!") window.location.href = "product.php";
                }
            );
        }

        
        function deleteBook(book_id) {
            $.post(
                "post/book_function.php", {
                    action: "delete_book",
                    id: book_id
                },
                function(data, status) {
                    alert(data);        
                    if (data == "Delete book successfully!") window.location.href = "product.php";
                }
            );
        }

        // add employee
        function addBook() {
            let name = document.getElementById("new-name").value;
            let author = document.getElementById("new-author").value;
            let category = document.getElementById("new-category").value;
            let price = document.getElementById("new-price").value;
            let description = document.getElementById("new-description").value;
            let image = document.getElementById("new-image").value;
            author = author.split(', ');
            // alert('abc');
            $.post(
                "post/book_function.php", {
                    action: "add_book",
                    name,
                    author,
                    category,
                    price,
                    description,
                    image
                },
                function(data, status) {
                    alert(data);
                    if (data == "Add new book successfully!") window.location.href = "product.php";
                }
            );
        }

        function deleteReview(combineID) {
            let id_arr = combineID.toString().split('.');
            let book_id = id_arr[0];
            let customer_id = id_arr[1];
            alert(book_id);
            $.post(
                "post/book_function.php", {
                    action: "delete_review",
                    book_id,
                    customer_id
                },
                function(data, status) {
                    alert(data);
                    if (data == "Delete review successfully!") window.location.href = "product.php";
                }
            );

        }
    </script>

</body>

</html>
