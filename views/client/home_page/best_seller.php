<link rel="stylesheet" href="../../../assets/css/home_page/best_seller.css">

<section class="all_products">
    <div class="container">
        <div class="text">
            <h2 class="title_all_product">Best <span class="color_theme">Seller</span></h2>
            <p class="product_text">There are many variations of passages of Lorem Ipsum available, but the majority
                have suffered lebmid alteration in some ledmid form
        </div>
        <?php         
            require_once '../../../data/config.php';
            $query = "select category from categories";                
            $result = mysqli_query($mysql_db, $query);
            $tag = array();
            print "<div class='book_tag'>
                    <div class='product_nav nav justify-content-center' role='tablist'>";
                print "<a class='nav-item nav-link active' data-toggle='tab' href='#all' role='tab'>All</a>";
                while ($row = mysqli_fetch_row($result)) {
                    $tag[] = $row[0];
                    $ref = '#'.$row[0];
                    print "<a class='nav-item nav-link' data-toggle='tab' href='$ref' role='tab'>$row[0]</a>";
                }           
            print "</div>
                </div>"; 
            
                print "
                <div class='tab_container tab-content'> ";
                    print "
                    <div class='tab-pane fade show active' id='all' role='tabpanel' aria-labelledby='home-tab'>
                        <div class='new_books owl-carousel best-seller'>";
                        $query = "select id, name, price, link_image, category from book where is_bestseller = 1";                
                        $result = mysqli_query($mysql_db, $query);
    
                        $row = array();
                        while ($r = mysqli_fetch_row($result)) {
                            $row[] = $r;
                        }
                        $nums = count($row);
                        
                        for ($i = 0; $i < count($row) - 1; $i = $i + 2) {                            
                            $img_1 = $row[$i][3];
                            $img_2 = $row[$i+1][3];
                            $name_1 = $row[$i][1];
                            $name_2 = $row[$i+1][1];
                            $price_1 = $row[$i][2];
                            $price_2 = $row[$i+1][2];
                            $id_1 = $row[$i][0];
                            $id_2 = $row[$i+1][0];
                            print "
                                <div class='book-col'>
                                    <div class='book'>
                                        <div class='book_thumb'>
                                            <a href='../detail_book_page/index.php?id=$id_1'><img src='$img_1' alt='' class='book_image'></a>
                                        </div>
                                        <div class='book_content'>
                                            <div class='product_content content_center'>
                                                <h4><a href='single-product.html'>$name_1</a></h4>
                                                <ul class='price d-flex'>
                                                    <li>$$price_1</li>                                    
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
                                                    $id = $row[$i][0];                                                    
                                                    // print "<script>alert('$id')</script>";                                                    
                                                    $query = "select round(avg(quality), 0) as star from reviewed_by where book_id = '$id' group by(book_id)";                
                                                    $sub_result = mysqli_query($mysql_db, $query);
                                                    $star = 0;
                                                    while($sub_row = mysqli_fetch_row($sub_result)) {
                                                        $star = $sub_row[0];
                                                    }
                                                    for ($a = 0; $a < $star; $a = $a + 1) {
                                                        print "<li class='on'><i class='fa fa-star-o'></i></li>";
                                                    }
                                                    for ($a; $a < 5; $a++) {
                                                        print "<li><i class='fa fa-star-o'></i></li>";
                                                    }     
                                                print "
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='book'>
                                        <div class='book_thumb'>
                                            <a href='../detail_book_page/index.php?id=$id_2'><img src='$img_2' alt='' class='book_image'></a>
                                        </div>
                                        <div class='book_content'>
                                            <div class='product_content content_center'>
                                                <h4><a href='single-product.html'>$name_2</a></h4>
                                                <ul class='price d-flex'>
                                                    <li>$$price_2</li>                                       
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
                                                    // print "<script>alert('abc')</script>";
                                                    $id = $row[$i + 1][0];
                                                    $query = "select round(avg(quality), 0) as star from reviewed_by where book_id = '$id' group by(book_id)";                
                                                    $sub_result = mysqli_query($mysql_db, $query);
                                                    $star = 0;
                                                    while($sub_row = mysqli_fetch_row($sub_result)) {
                                                        $star = $sub_row[0];
                                                    }
                                                    for ($a = 0; $a < $star; $a = $a + 1) {
                                                        print "<li class='on'><i class='fa fa-star-o'></i></li>";
                                                    }
                                                    for ($a; $a < 5; $a++) {
                                                        print "<li><i class='fa fa-star-o'></i></li>";
                                                    }     
                                                print "                                                 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        } 
                    print "</div>";  
                    print "</div>";   






                    for($i = 0; $i < count($tag); $i++) {
                        $tag_name = $tag[$i];
                        $products = array();
                        for ($j = 0; $j < count($row); $j++) {
                            if ($row[$j][4] == $tag_name) {
                                $products[] = $row[$j];
                            }
                        }
                        print "
                        <div class='tab-pane fade show' id='$tag_name' role='tabpanel' aria-labelledby='home-tab'>
                            <div class='new_books owl-carousel best-seller'>";
                            // $query = "select id, name, price, link_image from book where is_bestseller = 1";                
                            // $result = mysqli_query($mysql_db, $query);
        
                            // $row = array();
                            // while ($r = mysqli_fetch_row($result)) {
                            //     $row[] = $r;
                            // }
                            // $nums = count($row);
                            
                            for ($j = 0; $j < count($products) - 1; $j = $j + 2) {                            
                                $img_1 = $products[$j][3];
                                $img_2 = $products[$j+1][3];
                                $name_1 = $products[$j][1];
                                $name_2 = $products[$j+1][1];
                                $price_1 = $products[$j][2];
                                $price_2 = $products[$j+1][2];
                                $id_1 = $row[$i][0];
                                $id_2 = $row[$i+1][0];
                                print "
                                    <div class='book-col'>
                                        <div class='book'>
                                            <div class='book_thumb'>
                                                <a href='../detail_book_page/index.php?id=$id_1'><img src='$img_1' alt='' class='book_image'></a>
                                            </div>
                                            <div class='book_content'>
                                                <div class='product_content content_center'>
                                                    <h4><a href='single-product.html'>$name_1</a></h4>
                                                    <ul class='price d-flex'>
                                                        <li>$$price_1</li>                                    
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
                                                        $id = $products[$i][0];                                                    
                                                        // print "<script>alert('$id')</script>";                                                    
                                                        $query = "select round(avg(quality), 0) as star from reviewed_by where book_id = '$id' group by(book_id)";                
                                                        $sub_result = mysqli_query($mysql_db, $query);
                                                        $star = 0;
                                                        while($sub_row = mysqli_fetch_row($sub_result)) {
                                                            $star = $sub_row[0];
                                                        }
                                                        for ($a = 0; $a < $star; $a = $a + 1) {
                                                            print "<li class='on'><i class='fa fa-star-o'></i></li>";
                                                        }
                                                        for ($a; $a < 5; $a++) {
                                                            print "<li><i class='fa fa-star-o'></i></li>";
                                                        }     
                                                    print "
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='book'>
                                            <div class='book_thumb'>
                                                <a href='../detail_book_page/index.php?id=$id_2'><img src='$img_2' alt='' class='book_image'></a>
                                            </div>
                                            <div class='book_content'>
                                                <div class='product_content content_center'>
                                                    <h4><a href='single-product.html'>$name_2</a></h4>
                                                    <ul class='price d-flex'>
                                                        <li>$$price_2</li>                                       
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
                                                        // print "<script>alert('abc')</script>";
                                                        $id = $products[$i + 1][0];
                                                        $query = "select round(avg(quality), 0) as star from reviewed_by where book_id = '$id' group by(book_id)";                
                                                        $sub_result = mysqli_query($mysql_db, $query);
                                                        $star = 0;
                                                        while($sub_row = mysqli_fetch_row($sub_result)) {
                                                            $star = $sub_row[0];
                                                        }
                                                        for ($a = 0; $a < $star; $a = $a + 1) {
                                                            print "<li class='on'><i class='fa fa-star-o'></i></li>";
                                                        }
                                                        for ($a; $a < 5; $a++) {
                                                            print "<li><i class='fa fa-star-o'></i></li>";
                                                        }     
                                                    print "                                                 
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                            } 
                        print "</div>";  
                        print "</div>";
                    }

                print "</div>";  
                      
        ?>

            
    </div>
</section>



<script src="../../../assets/owl_carousel/dist/owl.carousel.min.js"></script>
<script>
$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        loop: false,
        items: 4,
        responsiveClass: true,
        nav: true,
        navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            // breakpoint from 480 up
            576: {
                items: 2
            },
            // breakpoint from 768 up
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });    
});
</script>