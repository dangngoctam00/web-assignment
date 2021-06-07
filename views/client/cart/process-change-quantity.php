<?php 

    require_once '../../../data/config.php';
    // echo $_SERVER["REQUEST_METHOD"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);

        $cart_data = json_decode($cookie_data, true); 
        $index = array_search($_POST['itemID'],array_column($cart_data,"item_id"));
        
        // echo json_encode($cart_data);

            if ($index!==false){
            $cart_data[$index]["item_quantity"] = $_POST["quantity"];
            $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
            setcookie('shopping_cart', $item_data, time() + (86400 * 30), '/');
            
        }
    }

?>