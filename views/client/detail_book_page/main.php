<?php
    session_start();
    $book_id = $_GET["id"];
    //$book_id = 3;
    require ('../../../data/config.php'); 

    $sql = "SELECT name, price, description, link_image, published_at from book where id = $book_id";
    $res = $mysql_db -> query($sql);

    $name_book ="";
    $price ="";
    $published ="";
    $link = "";
    while ($row = $res->fetch_assoc()){
        $name_book = $row['name'];
        $price = $row['price'];
        $description = $row['description'];
        $published = $row['published_at'];
        $link = $row['link_image'];
    }

    // get author
    $author="";
    $sql = "SELECT author from written_by where book_id = $book_id";
    $res = $mysql_db -> query($sql);
    while ($row = $res -> fetch_assoc()){
        $author.=' - ' . $row['author']; 
    }

    // submit review
    $qualityStar = 0;
    $contentReview = "";
    $name_cus = "Customer - Not login";

    if (isset($_POST['submit'])){

        if (!isset($_SESSION['email'])) {
            header('Location: ../authenticate/login.php');
            exit();
        }

        $name_cus = $_SESSION['name'];
        $id_cus = -1;
        // get id by name
        $sql = "SELECT id FROM customer where name LIKE '$name_cus' ";
        $res = $mysql_db -> query($sql);
        while ($row = $res -> fetch_assoc()){
            $id_cus = $row['id'];
        }
        //echo "<script> alert($id_cus) </script>";

        if ($_POST['star']==0){
            $qualityStar =  0;    
        } else {
            $qualityStar =  6 - $_POST['star'];
        }
        $contentReview = $_POST['content'];

        // $qualityStar = 6 - $_POST['star'];
        // $contentReview = $_POST['content'];
        // $priceStar = 6 - $_POST['star1'];
        // echo "<script> alert($qualityStar) </script>";
        // echo "<script> alert($priceStar) </script>";

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $day = date('Y-m-d H:i:s');

        $sql = "INSERT INTO reviewed_by(book_id,customer_id,quality,date_review,content)
                VALUES ($book_id,$id_cus,$qualityStar,'$day','$contentReview')";
        
        $res = $mysql_db -> query($sql);
    }

    // get address and quality
    $quality = 0;
    $address = "";

    if (isset($_POST['add_to_card'])){  // sẽ gửi book_id, $quality, $address
        $quality = $_POST['qty'];
        $address = $_POST['address'];  
        
    }

?>

<!-- prevent resubmit -->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


<link rel="stylesheet" href="../../../assets/css/detail_book_page/detail_book.css">
<div class="container-fluid">
    <div class="row" id="background">
        <h3 class="title col-md-12">4T BOOKSTORE</h3>
    </div>
    <div class="row">
        <div class="col-md-9" id="thumb">
            <div class="row">
                <div class="col-md-6">
                    <div class="fotorama" data-nav="thumbs">    
                        <?php
                            $sql = "SELECT link from image_foto where book_id = $book_id";
                            $res = $mysql_db -> query($sql);
                            while ($row = $res -> fetch_assoc()){
                        ?>
                            
                            <img src=" <?php echo $row['link'] ?> " alt="image">
                        <?php
                            }
                        ?>

                        <!-- <img src="../../../assets/images/detail_book_page/2.jpeg" alt="image 2">
                        <img src="../../../assets/images/detail_book_page/6.jpeg" alt="image 6"> -->
                    </div>

                   

                </div>
                <div class="col-md-6">
                    <div class="infor_product">
                        <h4 class="titlebook"> <?php echo $name_book ?> </h4>
                        <h6 class="author">Author: <span> <?php echo $author ?> </span></h6>

                        <?php
                            $sum = 0;
                            $count = 0;
                            $sql = "SELECT quality FROM reviewed_by where book_id = $book_id";
                            $res = $mysql_db -> query($sql);
                            while ($row = $res->fetch_assoc()){
                                $sum += $row['quality'];
                                $count++;
                            }
                            if ($count==0) $avr = 0;
                            else $avr = (int)($sum/$count);
                        ?>

                        <div class="viewrating">
                            <!-- <span class="fa fa-star fa-1x checked"></span>
                            <span class="fa fa-star fa-1x checked"></span>
                            <span class="fa fa-star fa-1x checked"></span>
                            <span class="fa fa-star fa-1x checked"></span>
                            <span class="fa fa-star fa-1x"></span> -->
                            <?php
                                $n = $avr;
                                $output = "";
                                for ($i=0; $i<$n; $i++){
                                    $output .= "
                                        <span class='fa fa-star fa-1x checked'></span>";
                                }
                                for ($i=0; $i<5-$n; $i++){
                                    $output .= "
                                        <span class='fa fa-star fa-1x'></span>";
                                }
                                echo $output;
                            ?>
                        </div>
                        <div class="price">
                            <h4>$ <?php echo $price ?> </h4>
                        </div>
                        <div class="line_1"></div>
                        <div class="description">
                            <p> Publication date: <?php echo $published ?> </p>
                        </div>
                        <div class="line_1"></div>



                        <div class="address">
                            <!-- Delivery to <span>Ho Chi Minh city, VietNam - </span>
                            <a href="#" data-toggle="modal" data-target="#changeaddress">CHANGE ADDRESS </a> <br>

                            <div class="modal fade" id="changeaddress" tabindex="-1" role="dialog" aria-labelledby="changeaddresstitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="changeaddresstitle">Delivery address</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="city">Province/City</label>
                                                <select class="form-control" id="city">
                                                    <option>Ho Chi Minh city</option>
                                                    <option>Tien Giang</option>
                                                    <option>Da Nang</option>
                                                    <option>Quang Ninh</option>
                                                    <option>Khanh Hoa</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="distrist">District</label>
                                                <select class="form-control" id="district">
                                                    <option>District 1</option>
                                                    <option>District 2</option>
                                                    <option>District 3</option>
                                                    <option>District 4</option>
                                                    <option>District 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="form-group"> -->
                            <form action="" method="post">
                                <label for="addr">Address delivery</label>
                                <select class="form-control" id="addr" name="address">
                                    <option>An Giang</option>
                                    <option>Bac Ninh</option>
                                    <option>Ben Tre</option>
                                    <option>Ca Mau</option>
                                    <option>Can Tho</option>
                                    <option>Da Nang</option>
                                    <option>Dong Nai</option>
                                    <option>Ha Noi</option>
                                    <option>Khanh Hoa</option>
                                    <option>Kien Giang</option>
                                    <option>Long An</option>
                                    <option>Nam Dinh</option>
                                    <option>Nghe An</option>
                                    <option>Ninh Binh</option>
                                    <option>Quang Binh</option>
                                    <option>Quang Nam</option>
                                    <option>Quang Ngai</option>
                                    <option>Thanh Hoa</option>
                                    <option>Tien Giang</option>
                                    <option selected="selected">TP Ho Chi Minh</option>
                                    <option>Tra Vinh</option>
                                    <option>Vinh Long</option>
                                    <option>Vinh Phuc</option>
                                    <option>Yen Bai</option>
                                </select>
                                <br>
                                <p>Delivery charges: <span>$2</span></p>
                                <div class="line_1"></div>

                                <div class=row>
                                    <div class="col-md-5">
                                        <span>Quantity</span>
                                        <input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
                                    </div>
                                    <div class="col-md-5">
                                        <input name="add_to_card" type="submit" value="ADD TO CARD" class="btn btn-primary" style="margin-top: 8%;">
                                        <!-- <button type="button" class="btn btn-primary" id="btn_add" name="add_to_card">ADD TO CARD</button> -->
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            
                            </form>
                            <!-- </div> -->

                        </div>



                        <!-- <div class="line_1"></div> -->
                        <!-- <div class=row>
                            <div class="col-md-5">
                                <span>Quantity</span>
                                <input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
                            </div>
                            <div class="col-md-5">
                                <button type="button" class="btn btn-primary" id="btn_add">ADD TO CARD</button>
                            </div>
                            <div class="col-md-2"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class=row>
                <div class="tabproduct col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a id="tab1" class="nav-link active" data-toggle="tab" role="tab" href="#detailproduct">Detail</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab2" class="nav-link" data-toggle="tab" role="tab" href="#reviewproduct">Reviews</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="detailproduct" role="tabpanel" aria-labelledby="tab1">
                            <p> <?php echo $description ?> </p>
                        </div>
                        <div class="tab-pane fade" id="reviewproduct" role="tabpanel" aria-labelledby="tab2">
                           
                            <div class="reviewed">
                                <h4 style="margin-top: 3%; margin-bottom: 2%;">You're reviewing</h4>
                                <!-- <h5> <?php //echo $name_cus ?> </h5> -->
                                <div class="row" style="margin-top: 2%;">
                                    <!-- <div class="col-md-1">
                                        <h6>Quality</h6>
                                    </div>  -->
                                    <div class="col-md-12">
                                        <div class="stars">
                                            <form action="" method="POST">
                                                <div class="row">
                                                    <div class = "col-md-3">
                                                        <h6>Quality</h6>
                                                        <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                                                        <label class="star star-1" for="star-1"></label>
                                                        <input class="star star-2" id="star2" type="radio" name="star" value="2"/>
                                                        <label class="star star-2" for="star2"></label>
                                                        <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                                                        <label class="star star-3" for="star-3"></label>
                                                        <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                                                        <label class="star star-4" for="star-4"></label>
                                                        <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                                                        <label class="star star-5" for="star-5"></label>   
                                                    </div>
                                                    <div class = "col-md-9"></div>
                                                </div>
                                                <br>
                                                <label for="contentreview">
                                                <h6>Review</h6>
                                                </label>
                                                <textarea class="form-control" id="contentreview" name="content" rows="5"></textarea>

                                                <!-- <h6>Price</h6> -->
                                                <!-- <br>
                                                Price <br>
                                                <input class="star star-1" id="star-11" type="radio" name="star_1" value="6"/>
                                                <label class="star star-1" for="star-11"></label>
                                                <input class="star star-2" id="star-22" type="radio" name="star_1" value="7"/>
                                                <label class="star star-2" for="star-22"></label>
                                                <input class="star star-3" id="star-33" type="radio" name="star_1" value="8"/>
                                                <label class="star star-3" for="star-33"></label>
                                                <input class="star star-4" id="star-44" type="radio" name="star_1" value="9"/>
                                                <label class="star star-4" for="star-44"></label>
                                                <input class="star star-5" id="star-55" type="radio" name="star_1" value="10"/>
                                                <label class="star star-5" for="star-55"></label> -->

                                                <input name="submit" type="submit" value="Submit review" class="btn btn-primary" style="margin-top: 2%;">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-9"></div>


                                </div>
                            </div>

                            <div class="line_1"></div>

                            <div class="row">
                                <h4 class="titlereview col-md-12">Customer Reviews</h4>
                            </div>

                            <?php
                                $sql = "SELECT * 
                                FROM reviewed_by r, customer c
                                WHERE r.customer_id = c.id AND r.book_id = $book_id 
                                ORDER BY date_review DESC";
                                $res = $mysql_db -> query($sql);
                                while ($row = $res -> fetch_assoc()){
                            ?>

                            <div class="row">
                                <div class="customer col-md-12">
                                    <h6> <?php echo $row['name'] ?> </h6>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row" style="margin-bottom: 1%;">
                                                <div class="col-md-3">
                                                    Quality
                                                </div>
                                                <div class="col-md-9">

                                                    <?php
                                                        $n = $row['quality'];
                                                        $output = "";
                                                        for ($i=0; $i<$n; $i++){
                                                            $output .= "
                                                            <span class='fa fa-star fa-1x checked'></span>";
                                                        }
                                                        for ($i=0; $i<5-$n; $i++){
                                                            $output .= "
                                                            <span class='fa fa-star fa-1x'></span>";
                                                        }
                                                        echo $output;
                                                    ?>
                                                    <!-- <span class="fa fa-star fa-1x checked"></span>
                                                    <span class="fa fa-star fa-1x checked"></span>
                                                    <span class="fa fa-star fa-1x checked"></span>
                                                    <span class="fa fa-star fa-1x checked"></span>
                                                    <span class="fa fa-star fa-1x"></span> -->
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 1%;">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-9">

                                                    <?php
                                                        // $n = $row['price'];
                                                        // $output = "";
                                                        // for ($i=0; $i<$n; $i++){
                                                        //     $output .= "
                                                        //     <span class='fa fa-star fa-1x checked'></span>";
                                                        // }
                                                        // for ($i=0; $i<5-$n; $i++){
                                                        //     $output .= "
                                                        //     <span class='fa fa-star fa-1x'></span>";
                                                        // }
                                                        // echo $output;
                                                    ?>

                                                    <!-- <span class="fa fa-star fa-1x checked"></span>
                                                    <span class="fa fa-star fa-1x checked"></span>
                                                    <span class="fa fa-star fa-1x checked"></span>
                                                    <span class="fa fa-star fa-1x checked"></span>
                                                    <span class="fa fa-star fa-1x"></span> -->
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 1%;">
                                                <div class="col-md-3">
                                                    Review:
                                                </div>
                                                <p>
                                                    <?php echo $row['content'] ?>
                                                </p>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="inforrating">
                                                <p>
                                                    Review by: <?php echo $row['name'] ?>
                                                </p>
                                                <p>
                                                    Posted on: <?php echo $row['date_review'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="line_1"></div>
                                </div>
                            </div>

                            <?php 
                                }
                            ?>

                                <!-- </div> -->
                                <!-- <div class="row"> -->
                                    <!-- <div class="col-md-1">
                                        <h6 style="margin-top: 3%;">Price</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="stars">
                                            <form action="">
                                                <input class="star star-1" id="star-11" type="radio" name="star" />
                                                <label class="star star-1" for="star-11"></label>
                                                <input class="star star-2" id="star-22" type="radio" name="star" />
                                                <label class="star star-2" for="star-22"></label>
                                                <input class="star star-3" id="star-33" type="radio" name="star" />
                                                <label class="star star-3" for="star-33"></label>
                                                <input class="star star-4" id="star-44" type="radio" name="star" />
                                                <label class="star star-4" for="star-44"></label>
                                                <input class="star star-5" id="star-55" type="radio" name="star" />
                                                <label class="star star-5" for="star-55"></label>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-9"></div> -->
                                <!-- </div> -->
                                <!-- <form>
                                    <div class="form-group">
                                        <label for="contentreview">
                                            <h6>Review</h6>
                                        </label>
                                        <textarea class="form-control" id="contentreview" rows="3"></textarea>
                                    </div>
                                </form>
                                <button type="button" class="btn btn-primary" style="margin-top: 2%;">Submit review</button> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2" id="listcate">
            <!-- List categories -->
            <div class="caterory">
                <h4>PRODUCT CATERORIES</h4>
            </div>
            <div class="line"></div>

            <?php
                $sql = "SELECT c.category cate, COUNT(b.id) amount FROM categories c, book b WHERE c.category LIKE b.category
                        GROUP BY b.category";
                $res = $mysql_db -> query($sql);  
                while ($row = $res ->fetch_assoc()){
                   
            ?>

            <div class="row">
                <div class="col-md-12">
                    <a href="../product_page/index.php?category=<?php echo $row['cate'] ?>"> <?php echo $row['cate'] ?> <span>( <?php echo $row['amount'] ?> )</span></a>
                </div>
                <div class="subline"></div>
            </div>
            <?php
                }
            ?>
        </div>
            <!-- <div class="row">
                <div class="col-md-12">
                    <a href="#">Business <span>(4)</span></a>
                </div>
                <div class="subline"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#">Cookbooks <span>(6)</span></a>
                </div>
                <div class="subline"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#">Health & Fitness <span>(7)</span></a>
                </div>
                <div class="subline"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#">History <span>(8)</span></a>
                </div>
                <div class="subline"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#">Mystery <span>(9)</span></a>
                </div>
                <div class="subline"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#">Harry Poster <span>(20)</span></a>
                </div>
                <div class="subline"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#">Romance <span>(20)</span></a>
                </div>
                <div class="subline"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#">Humor Books <span>(17)</span></a>
                </div>
                <div class="subline"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#">Land of stories <span>(34)</span></a>
                </div>
                <div class="subline"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#">Toys & Games <span>(3)</span></a>
                </div>
                <div class="subline"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#">Hoodies <span>(3)</span></a>
                </div>
                <div class="subline"></div>
            </div> -->
      
        <!-- <div class="col-md-9">
                <div class="row">
                    <div class="col-md-1">
                        <p class="sortby">Sort by: </p>
                    </div>
                    <div class="col-md-11">
                        <select class="form-select" aria-label="Default select example" id="selection">
                            <option selected>Price from low to high</option>
                            <option value="1">Price from high to low</option>
                            <option value="2">Most populer</option>
                            <option value="3">Best seller</option>
                            <option value="4">Newest</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <a href=""></a>
                        </div>
                    </div>
                </div>
            </div> -->
    </div>
</div>