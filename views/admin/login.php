<?php
session_start();
if (isset($_SESSION['id_admin'])) {
    header("Location: index.php");
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
    <link rel="stylesheet" href="../../assets/css/admin/login.css">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="loginForm">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="user_name" id="user_name" class="form-control"
                                placeholder="username">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="password">
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <input type="button" id="loginBtn" value="Login" class="btn login_btn">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="../../assets/js/admin/login.js"></script>
</body>

</html>