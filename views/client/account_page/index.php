<?php 
    session_start();
    $id = $_SESSION['id'];
    require ('../../../data/config.php'); 
    $query = "SELECT * FROM customer WHERE id=$id";
    $result = $mysql_db->query($query);
    $customer = array();
    while ($item = mysqli_fetch_assoc($result)) {
        $customer = $item;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Account</title>
    <?php 
    include('../include/stylesheet.php'); ?>


</head>

<body>
    <?php include( "../include/header.php"); ?>
    <?php include("./main.php"); ?>
    <?php include("../include/footer.php"); ?>
    <?php include('../include/script.php'); ?>

    <script>
        // Update information
        function updateInfor(customer_id) {
            var name = $("#name").val();
            var email = $("#email").val();
            var originalEmail = $("#originalEmail").val();
            var phone = $("#phone").val();
            var birthday = $("#birthday").val();
            console.log(customer_id + ' - ' + name + ' - ' + email + ' - ' + originalEmail + ' - ' + phone + ' - ' + birthday);
            $.post(
                "account_func.php",
                {
                    action: "update_info",
                    id: customer_id,
                    name: name,
                    email: email,
                    originalEmail: originalEmail,
                    phone: phone,
                    birthday: birthday
                },
                function(data, status) {
                    alert(data);
                    if (data == "Update Information Successfully!")
                        window.location.href = "index.php";
                }
            );
        }

        // Change Password
        function changePassword(customer_id) {
            var oldPass = $("#oldPassword").val();
            var oldHashPass = $("#oldHashPassword").val();
            var newPass = $("#newPassword").val();
            var newPassConfirm = $("#confirmNewPassword").val();
            if (oldPass == '') {
                $("#oldPassErr").text("Please enter your current password!");
                setTimeout(function(){$("#oldPassErr").text('');}, 2000);
                return;
            }
            if (newPass == '') {
                $("#newPassErr").text("Please enter new password!");
                setTimeout(function(){$("#newPassErr").text('');}, 2000);
                return;
            }
            if (newPassConfirm == '') {
                $("#newPassConfErr").text("Please enter confirm password!");
                setTimeout(function(){$("#newPassConfErr").text('');}, 2000);
                return;
            }
            if (newPass == oldPass) {
                $("#newPassErr").text("New password must be different from current password!");
                setTimeout(function(){$("#newPassErr").text('');}, 2000);
                return;
            }
            if (newPass != newPassConfirm) {
                $("#newPassConfErr").text("Confirm password does not match!");
                setTimeout(function(){$("#newPassConfErr").text('');}, 2000);
                return;
            }
            $.post(
                "account_func.php",
                {
                    action: "change_password",
                    id: customer_id,
                    oldPass: oldPass,
                    oldHashPass: oldHashPass,
                    newPass: newPass
                },
                function(data, status) {
                    if (data == "incorrect_old_password") {
                        $("#oldPassErr").text("Current password is incorrect!");
                        setTimeout(function(){$("#oldPassErr").text('');}, 2000);
                        return;
                    }
                    alert(data);
                    if (data == "Change Password SUCCESSFULLY!")
                        window.location.href = "index.php";
                }
            );

        }
    </script>
</body>

</html>