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
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $register_at = $_POST['register_at'];
        $active = $_POST['active'];
        
        echo editCustomer($mysql_db, $id, $name, $email, $phone, $birthday, $register_at, $active);
    }
    function editCustomer($mysqli, $id, $name, $email, $phone, $birthday, $register_at, $active) {
        $query = "UPDATE customer 
                    SET name='$name', email='$email', phone='$phone', 
                        birthdate='$birthday', registered_at='$register_at', active='$active'
                    WHERE id=$id";
        $result = $mysqli->query($query);
        if ($result) return "Update Customer Information SUCCESSFULLY!";
        else return "Update Customer Information UNSUCCESSFULLY!";
    }
?>
