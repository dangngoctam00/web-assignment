<?php 
    require_once '../../../data/config.php';    
    $query = "insert into subscribes(email) values(?)";
    $stmt = mysqli_prepare($mysql_db, $query);
    mysqli_stmt_bind_param($stmt, 's', $_POST['email']);
    ($stmt);    
    if (mysqli_stmt_execute($stmt) == false) {        
        // mysqli_close($mysql_db);
        echo 'error';
    }   
    mysqli_close($mysql_db);
?>