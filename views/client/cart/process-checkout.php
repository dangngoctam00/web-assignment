<?php 

    require_once '../../../data/config.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $query = "insert into shopping_log(customer_id, total_price, created_at) values (?,?,?)";

        $stmt = mysqli_prepare($mysql_db, $query);

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $created_at = date('Y-m-d H:i:s');
        // bind parameter
        mysqli_stmt_bind_param($stmt, 'ids', $_POST['user_id'], $_POST['total_cost'] , $created_at);
        mysqli_stmt_execute($stmt);
        $log_id = $mysql_db->insert_id;
        $ids = $_POST['ids'];
        $quantities = $_POST['quantities'];
        foreach($ids as $idx => $id) {
            $query = "insert into shopping_log_entry(log_id,book_id, quantity) values (?,?,?)";

            $stmt = mysqli_prepare($mysql_db, $query);

            // bind parameter
            mysqli_stmt_bind_param($stmt, 'iii', $log_id, $id ,$quantities[$idx]);
            mysqli_stmt_execute($stmt);
        }
        setcookie("shopping_cart", "", time() - 3600, '/');
    }

?>