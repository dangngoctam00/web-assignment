<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    include('../include/stylesheet.php'); ?>    
    <title>Login</title>
    <link rel="stylesheet" href="../../../assets/css/authenticate/verify.css">
</head>

<body>
    <?php 
        require ('../../../data/config.php');
        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
            $query = "select email, hash from verification_account where email = ? and hash = ?";            
            $stmt = mysqli_prepare($mysql_db, $query);
            $email = $_GET['email'];
            $hash = $_GET['hash'];
            
            mysqli_stmt_bind_param($stmt, 'ss', $email, $hash);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                // print "<script>alert('$email/$hash')</script>";
                $query = "update customer set active = 1 where email = ?";
                $stmt = mysqli_prepare($mysql_db, $query);
                mysqli_stmt_bind_param($stmt, 's', $email);
                mysqli_stmt_execute($stmt);
                print '<p class="mesg">Your account have been activated successfully. Click <a href="./login.php">here</a> to go log in.</p>';    
            }
            else {
                print '<p class="mesg">Invalid approach, please use the link that has been sent to your email. Click <a href="../home_page">here</a> to go back home.</p>';    
            }
        }else{
            print '<p class="mesg">Invalid approach, please use the link that has been sent to your email. Click <a href="../home_page">here</a> to go back home.</p>';
        }
    ?>
</body>