<?php
session_start();
require "../../data/config.php";
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "SELECT * FROM admin WHERE user_name='" . $_POST["user_name"] . "' and password = '" . $_POST["password"] .
        "'";
    $result = $mysql_db->query($query);
    $row = $result->fetch_assoc();
    if (!empty($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["first_name"] = $row['first_name'];
    } else {
        $message = "Invalid Username or Password!";
    }
    echo $message;
}
?>
<?php

?>