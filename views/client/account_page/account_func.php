<?php 
    require ('../../../data/config.php'); 
    $action = isset($_POST['action']) ? $_POST['action'] : "";
    if ($action == "update_info") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $originalEmail = $_POST['originalEmail'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        echo updateInfor($mysql_db, $id, $name, $email, $originalEmail, $phone, $birthday);
    }
    function updateInfor($mysqli, $id, $name, $email, $originalEmail, $phone, $birthday) {
        $uncheck_constraint = "SET FOREIGN_KEY_CHECKS=0";
        $recheck_constraint = "SET FOREIGN_KEY_CHECKS=1";
        $queryCusTable = "UPDATE customer
                    SET name='$name', email='$email', phone='$phone', birthdate='$birthday'
                    WHERE id=$id;";
        $queryVerifyTable = "UPDATE verification_account
                SET email='$email'
                WHERE email='$originalEmail';";
        $mysqli->query($uncheck_constraint);
        $resultUpdateCusTable = $mysqli->query($queryCusTable);
        $resultUpdateVerifyTable = $mysqli->query($queryVerifyTable);
        $mysqli->query($recheck_constraint);
        if ($resultUpdateCusTable && $resultUpdateVerifyTable) return "Update Information SUCCESSFULLY!";
        else return "Update Information UNSUCCESSFULLY!";
    }

    
    if ($action == "change_password") {
        $id = $_POST['id'];
        $oldPass = $_POST['oldPass'];
        $oldHashPass = $_POST['oldHashPass'];
        $newPass = $_POST['newPass'];

        echo changePassword($mysql_db, $id, $oldPass, $oldHashPass,  $newPass);
    }

    function changePassword($mysqli, $id, $oldPass, $oldHashPass, $newPass) {
        if (!password_verify($oldPass, $oldHashPass)) return "incorrect_old_password";
        $newPass = password_hash($newPass, PASSWORD_DEFAULT);
        $query = "UPDATE customer
                    SET password='$newPass'
                    WHERE id=$id;";
        // echo $newPass;
        $result = $mysqli->query($query);
        if ($result) return "Change Password SUCCESSFULLY!";
        else return "Change Password UNSUCCESSFULLY!";
    }
?>