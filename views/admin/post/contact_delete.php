<?php
session_start();
require "../../../data/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = "Server Error, operation cancelled";
    $query = "delete from send_email_log where id = '" . $_POST['id'] . "'";

    if ($mysql_db->query($query)) {
        $message = "Contact with id " . $_POST['id'] . " has been removed";
    }
    echo $message;
}