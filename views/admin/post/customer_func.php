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
        if ($result) return "Delete Customer Successfully!";
        else return "Delete Customer Unsuccessfully!";
    }

    // Add New Customer
    if ($action == "add_customer") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $register_at = $_POST['register_at'];
        $active = $_POST['active'];
        $password = $_POST['password'];

        echo addCustomer($mysql_db, $name, $email, $phone, $birthday, $register_at, $active, $password);
    }
    function addCustomer($mysqli, $name, $email, $phone, $birthday, $register_at, $active, $password) {
        $query = "INSERT INTO customer (name, email, phone, birthdate, registered_at, active, password) 
                    VALUES ('$name', '$email', '$phone', '$birthday', '$register_at', '$active', '$password')";
        $result = $mysqli->query($query);
        if ($result) return "Add New Customer Successfully!";
        else return "Add New Customer Unsuccessfully!";
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
        $password = $_POST['password'];

        echo editCustomer($mysql_db, $id, $name, $email, $phone, $birthday, $register_at, $active, $password);
    }
    function editCustomer($mysqli, $id, $name, $email, $phone, $birthday, $register_at, $active, $password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE customer 
                    SET name='$name', email='$email', phone='$phone', 
                        birthdate='$birthday', registered_at='$register_at', active='$active', password='$password'
                    WHERE id=$id";
        $result = $mysqli->query($query);
        if ($result) return "Update Customer Information Successfully!";
        else return "Update Customer Information Unsuccessfully!";
    }

?>
