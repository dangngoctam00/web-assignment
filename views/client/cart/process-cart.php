<?php 
    
    if(isset($_COOKIE["shopping_cart"])) {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true, JSON_UNESCAPED_UNICODE);
        $arr = array_column($cart_data, 'item_id');
        foreach($arr as $a) {
            echo "<p>$a</p>";
        }
    }
    else {
        $cart_data = array();
    }

    if (empty($_POST['id'])) {
        exit();
    }

    $item_id_list = array_column($cart_data, 'item_id');
    if(in_array($_POST["id"], $item_id_list)){
        foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]["item_id"] == $_POST["id"])
			{
                $quantity = 1;
                if (!empty($_POST['quantity'])) {
                    $quantity =  $_POST['quantity'];
                }
				$cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $quantity;
			}
		}		
	}
    else {
        $item_array = array(
            'item_id'			=>	$_POST['id'],
            'item_name'			=>	$_POST['name'],
            'item_price'		=>	$_POST['price'],
            'item_city'         =>  !empty($_POST['city']) ? $_POST['city'] : '',
            'item_image'        =>  $_POST['image'],
            'item_quantity'     =>  !empty($_POST['quantity']) ? $_POST['quantity'] : '1'
        );
        $cart_data[] = $item_array;    
    }
    
    $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30), '/');
?>