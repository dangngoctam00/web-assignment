<?php
session_start();
require "../../../data/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = "delete from shopping_log where id = '" . $_POST['id'] . "'";

    if ($mysql_db->query($query)) {
        $message = "Shopping log with id " . $_POST['id'] . " has been removed";
    } else $message = $mysql_db->error;
    echo $message;
}