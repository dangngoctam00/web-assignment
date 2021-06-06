<link rel="stylesheet" href="../../../assets/css/home_page/new_product.css">
<link rel="stylesheet" href="../../../assets/owl_carousel/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="../../../assets/owl_carousel/dist/assets/owl.theme.default.min.css">
<section class="new_product">
    <div class="container">
        <div class="text">
            <h2 class="title_new_product">New <span class="color_theme">Products</span></h2>
            <p class="product_text">There are many variations of passages of Lorem Ipsum available, but the majority
                have suffered lebmid alteration in some ledmid form
            </div>            
        <div class="new_books owl-carousel">
        
            <?php 
                require_once '../../../data/config.php';
                $query = "select id, name, price, link_image from book where datediff(curdate(), published_at) < 7";                
                $result = mysqli_query($mysql_db, $query);
                while ($row = mysqli_fetch_row($result)) {
                    $query = "select round(avg(quality), 0) as star from reviewed_by where book_id = '$row[0]' group by(book_id)";                
                    $sub_result = mysqli_query($mysql_db, $query);
                    $star = 0;
                    while($sub_row = mysqli_fetch_row($sub_result)) {
                        $star = $sub_row[0];
                    }
                    $id = $row[0];
                    print "
                    <div class='book'>
                        <div class='book_thumb'>
                            <a href='../detail_book_page/index.php?id=$id'><img src='$row[3]' alt='' class='book_image'></a>
                        </div>
                        <div class='book_content'>
                            <div class='product_content content_center'>
                                <h4><a href='single-product.html'>$row[1]</a></h4>
                                <ul class='price d-flex'>
                                    <li>$$row[2]</li>                                   
                                </ul>
                            </div>
                            <div class='action'>
                                <div class='actions_inner'>
                                    <ul class='add_to_links'>
                                        <li><a class='cart'
                                                href='https://demo.hasthemes.com/boighor-preview/boighor/cart.html'><i
                                                    class='fas fa-cart-plus'></i></a></li>
                                        <li><a class='compare'
                                                href='https://demo.hasthemes.com/boighor-preview/boighor/index.html#'><i
                                                    class='far fa-heart'></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class='book_rate'>
                                <ul class='rating d-flex'>";
                                    for ($i = 0; $i < $star; $i = $i + 1) {
                                        print "<li class='on'><i class='fa fa-star-o'></i></li>";
                                    }
                                    for ($i; $i < 5; $i++) {
                                        print "<li><i class='fa fa-star-o'></i></li>";
                                    }                                                                
                                print"
                                </ul>
                            </div>
                        </div>
                    </div>";
                }                
            ?>
        </div>
    </div>

</section>

