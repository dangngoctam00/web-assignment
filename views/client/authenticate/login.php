<?php
        require ('../../../data/config.php');    
        $error = '';
        session_start();
        if (isset($_SESSION['email'])) {
            header('Location: ../home_page/');
            exit();
        }
        else {                        
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST['email']) || empty($_POST['password'])) {
                    $error = 'Email and password cannot be blank.';                       
                }
                else {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $query = "select id ,name, email, phone, birthdate, password, active from customer where email=?";
                    
                    $stmt = mysqli_prepare($mysql_db, $query);
                
                    // bind parameter
                    mysqli_stmt_bind_param($stmt, 's', $email);
                    //execute query
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                                          
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id ,$name, $email, $phone, $birthdate, $hashed_password, $active);
                        if(mysqli_stmt_fetch($stmt)){
                            // echo "<script>alert('$hashed_password / $password')</script>"; 
                            if(password_verify($password, $hashed_password) && $active == 1){
                                // echo "<script>alert('123')</script>";  
                                // Password is correct, so start a new session
                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["email"] = $email;
                                $_SESSION["name"] = $name;
                                $_SESSION["phone"] = $phone;                            
                                $_SESSION["birthdate"] = $birthdate;     
                                $_SESSION["id"] = $id;                            
                                
                                // Redirect user to welcome page
                                header("location: ../home_page/index.php");
                            } else{
                                // Password is not valid, display a generic error message
                                $error = "Invalid email or password.";
                            }
                        }
                    } else{
                        // Username doesn't exist, display a generic error message
                        $error = "Invalid email or password.";
                    }
                } 
            }
        }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    include('../include/stylesheet.php'); ?>
    <link rel="stylesheet" href="../../../assets/css/authenticate/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container row">
        <div class="col-10 col-md-6 col-lg-7">
            <div class="logo">
                <img class="logo-img" src="../../../assets/images/header/logo.png" alt="logo">
                <p class="title">Login to purchase your order!</p> 
            </div>
            <div class="form-login">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" class="form-control" type="text" name="email" value="<?php print !empty($error) ? $_POST['email'] :  '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password" value="">
                    </div>
                    <?php                        
                        if (!empty($error)) {
                            print "<p class='error_msg'>$error<p>";
                        }
                    ?>
                    <hr>
                    <div class="action-btn">
                        <button type="submit" class="btn btn-primary btn-submit btn-block">Log In</button>
                        <a href="./register.php" class="btn btn-outline-secondary btn-block mr-t">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

</body>
</html>