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
                                    $user_id = '';
                                    if (!empty($_SESSION['id'])) {
                                        $user_id = $_SESSION['id'];
                                    }
                                    $total = 0;
                                    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                    $cart_data = json_decode($cookie_data, true); 
                                    $address = '';      
                                    $id_arr = 'a';                             
                                    foreach($cart_data as $keys => $values) {
                                        $id = $values['item_id'];
                                        $id_arr = $id_arr . '-' . $id;
                                        $product_name_class = 'product-name-' . $id;
                                        $product_price_class = 'product-price-' . $id;
                                        $product_quantity_class = 'product-quantity-' .$id;
                                        $product_total_class = 'product-total-' . $id;                                        
                                        if ($values['item_city'] != '') {
                                            $address = $values['item_city'];
                                        }
                            ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="https://demo.hasthemes.com/boighor-preview/boighor/cart.html#">
                                        <img class="product-imgage" src="<?php echo $values["item_image"]; ?>" alt="product img"></a>
                                    </td>
                                    <td class="<?php echo $product_name_class ?>"><?php echo $values["item_name"]; ?></td>
                                    <td class="<?php echo $product_price_class ?>">$ <?php echo $values["item_price"]; ?></td>
                                    <td ><input id="quantity" class="<?php echo $product_quantity_class ?>" type="number" value="<?php echo $values["item_quantity"]; ?>"></td>
                                    <td class="<?php echo $product_total_class ?>">$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                                    <td class="product-remove"><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                                </tr>
                                <?php	
                                    $total += number_format($values["item_quantity"] * $values["item_price"], 2);
                                }
                                ?>
                                <tr>
                                    <td class="value-order" colspan="6" align="right">
                                        <p class="total-cost-product">Book cost: $<?php echo number_format($total, 2); ?><p>
                                        <p>Ship cost: $2</p>
                                        <p class="total-cost">Total: $<?php  echo number_format($total + 2, 2);?></p>
                                    </td>
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
                    <div class="cartbox__btn">   
                        <div class="form-group">
                            <label class="address-label">Address: </label>
                            <input class="form-control" type="text" value="<?php echo $address ?>">
                            <input class="user-id" type="hidden" value="<?php echo $user_id ?>">
                        </div>               
                        <button class="checkout-btn <?php echo $id_arr; ?>">Check Out</button>
			        </div>
                </form>    
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

    $('.checkout-btn').click(function(event) {
        
        let user_id = $('.user-id').val();
        // alert(user_id);
        if (user_id == '') {
            alert('You have not loged in yet! Please login to purchase this order.');
            return false;
        }

        let ids = this.className.split(' ')[1];
        ids = ids.split('-');
        ids.shift();
        let total_cost = $('.total-cost-product').text();
        total_cost = total_cost.split(' ')[2];
        total_cost = total_cost.substring(1, total_cost.length);
        // alert(total_cost);
        let quantities = [];
        for (i = 0; i < ids.length; ++i) {
            quantities.push($('.product-quantity-'+ids[i]).val());
        } 
        // alert(quantities + '/' + ids);
        
        
        $.ajax({
            type: 'POST',
            url: "process-checkout.php",
            data: { ids, quantities, user_id, total_cost },
            success: function(mesg){
                if (mesg == 'error') {                      
                    return;
                } 
                alert("Purchase successfully");  
                location.reload();                 
            }                                         
        });    


        event.preventDefault();
        return false;
    });
</script>