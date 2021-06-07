<?php
session_start();
unset($_SESSION['id_admin']);
unset($_SESSION["first_name"]);
header("Location:login.php");
