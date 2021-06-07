<?php
session_start();
require "../../../data/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = "";
    $query = "SELECT * FROM admin WHERE user_name='" . $_POST["user_name"] . "' and password = '" . $_POST["password"] .
        "'";
    $result = $mysql_db->query($query);
    $row = $result->fetch_assoc();
    if (!empty($row)) {
        $_SESSION['id_admin'] = $row['id'];
        $_SESSION["first_name"] = $row['first_name'];
    } else {
        $message = "Invalid Username or Password!";
    }
    echo $message;
}
?>
<?php

?>