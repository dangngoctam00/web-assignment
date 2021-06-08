<?php
session_start();
unset($_SESSION['id_admin']);
unset($_SESSION["first_name"]);
session_destroy();
header("Location:login.php");
