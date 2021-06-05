<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["first_name"]);
header("Location:login.php");