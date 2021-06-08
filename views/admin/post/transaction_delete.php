<?php
session_start();
require "../../../data/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uncheck_constraint = "SET FOREIGN_KEY_CHECKS=0;";
    $recheck_constraint = "SET FOREIGN_KEY_CHECKS=1;";
    $queryShop_log = "DELETE FROM shopping_log WHERE id = '" . $_POST['id'] . "';";
    $queryShop_log_entry = "DELETE FROM shopping_log_entry WHERE log_id={$_POST['id']};";
    if ($mysql_db->multi_query($uncheck_constraint.$queryShop_log_entry.$queryShop_log.$recheck_constraint)) {
        $message = "Shopping log with id " . $_POST['id'] . " has been removed";
    } else $message = $mysql_db->error;
    echo $message;
}