<?php 
    require "../../../data/config.php";
    $action = isset($_POST['action']) ? $_POST['action'] : "";

    // Delete Customer
    if ($action == "delete_customer") {
        $id = $_POST['id'];
        echo deleteCustomer($mysql_db, $id);
    }

    function deleteCustomer($mysqli, $id) {
        $query = "DELETE FROM customer WHERE id=$id";
        $result = $mysqli->query($query);
        if ($result) return "Delete Customer SUCCESSFULLY!";
        else return "Delete Customer UNSUCCESSFULLY!";
    }

    // Edit Customer Information
    if ($action == "edit_customer") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $originalEmail = $_POST['originalEmail'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $register_at = $_POST['register_at'];
        $active = $_POST['active'];
        
        echo editCustomer($mysql_db, $id, $name, $email, $originalEmail, $phone, $birthday, $register_at, $active);
    }
    function editCustomer($mysqli, $id, $name, $email, $originalEmail, $phone, $birthday, $register_at, $active) {
        $uncheck_constraint = "SET FOREIGN_KEY_CHECKS=0;";
        
        $queryCusTable = "UPDATE customer 
                    SET name='$name', email='$email', phone='$phone', 
                        birthdate='$birthday', registered_at='$register_at', active='$active'
                    WHERE id=$id;";
        $queryVerTable = "UPDATE verification_account
                            SET email='$email'
                            WHERE email='$originalEmail';";
        $recheck_constraint = "SET FOREIGN_KEY_CHECKS=1;";
        $result = $mysqli->multi_query($uncheck_constraint.$queryCusTable.$queryVerTable.$recheck_constraint);
        if ($result) return "Update Customer Information SUCCESSFULLY!";
        else return "Update Customer Information UNSUCCESSFULLY!";
    }

?>