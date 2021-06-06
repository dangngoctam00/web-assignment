<link rel="stylesheet" href="../../../assets/css/about_page/main.css">
 <?php
    require_once "../../../data/config.php";
    $query = "select * from employee";
    $result = $mysql_db->query($query);

    ?>
 <div class="cart-main-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12">
                <form action="https://demo.hasthemes.com/boighor-preview/boighor/cart.html#">
                    <div class="table-content wnro__table table-responsive">
                        <table>
                            <thead>
                                <tr class="title-top">
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($_COOKIE["shopping_cart"]))
                                {
                                    $total = 0;
                                    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                    $cart_data = json_decode($cookie_data, true);
                                    foreach($cart_data as $keys => $values) {
                            ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="https://demo.hasthemes.com/boighor-preview/boighor/cart.html#">
                                        <img class="product-imgage" src="<?php echo $values["item_image"]; ?>" alt="product img"></a>
                                    </td>
                                    <td class="product-name"><?php echo $values["item_name"]; ?></td>
                                    <td class="product-price">$ <?php echo $values["item_price"]; ?></td>
                                    <td class="product-quantity"><input id="quantity" type="number" value="<?php echo $values["item_quantity"]; ?>"></td>
                                    <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                                    <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                                </tr>
                                <?php	
                                    $total += number_format($values["item_quantity"] * $values["item_price"], 2);
                                }
                                ?>
                                <tr>
                                    <td colspan="3" align="right">Total</td>
                                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                                    <td></td>
                                </tr>
                            <?php
                            }
                            else
                            {
                                echo '
                                <tr>
                                    <td colspan="5" align="center">No Item in Cart</td>
                                </tr>
                                ';
                            }
                            ?>                              
                            </tbody>
                        </table>
                    </div>
                </form>    
                <div class="cartbox__btn">                  
                    <button class="checkout-btn">Check Out</button>
			    </div>
          
            </div>
        </div>
        <div class="row checkout">
            <div class="col-lg-6 offset-lg-6">
                
                                   
            </div>
        </div>
    </div>
</div>

<script>
    $("#quantity").on("change keyup paste", function(){
        
    })
</script>