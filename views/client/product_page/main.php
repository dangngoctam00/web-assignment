<link rel="stylesheet" href="../../../assets/css/product_page/product.css">

<div class="product-page-banner text-center align-content-end align-middle">
    <div class="content">
        <h1 class="title">4T STORE</h1>
        <div class="route">
            <a href="#" style="color: #CE7852; font-style: italic;">Home</a> / <p class="d-inline">Books</p>
        </div>
    </div>
</div>
<div class="product-page py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="sidebar">
                    <div class="category">
                        <h5 class="text-uppercase fw-bold pb-3 border-bottom border-dark">Product category</h5>
                        <ul>
                            <?php foreach($categoriesDetail as $category) { ?>
                                <li><a href="index.php?category=<?php echo $category['name']; ?>"><?php echo ucwords($category['name']); ?><span class="float-end">(<?php echo $category['number'] ?>)</span></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="ads position-relative text-center">
                        <img src="../../../assets/images/product_page/banner_left.png" alt="banner" class="img-fluid my-3">
                        <div class="text position-absolute text-uppercase text-white">
                            <h5 class="color-orange">New product</h5>
                            <div class="">
                                <h2 class="fw-bold fs-1">Save up to <br>
                                    <span class="color-orange">40%</span>
                                    off
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="product-list row">
                    <?php foreach($books as $book) {?>
                        <div class="product text-center col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                            <div class="product-thumbnail">
                                <a href="../detail_book_page/index.php?id=<?php echo $book['id']; ?>"><img style="max-height: 210px;" src="<?php echo $book['link_image']?>"
                                        alt="product<?php echo $book['id']; ?>" class="img-fluid">
                                </a>
                            </div>
                            <div class="product-content text-center pt-3 pb-1 px-2">
                                <h6 title="<?php echo $book['name']; ?>"><?php echo $book['name']; ?></h6>
                                <ul class="price d-flex justify-content-center mt-1">
                                    <li class="color-orange mr-5 fw-bold">$<?php echo $book['price']; ?></li>
                                    <li class="fw-bold text-decoration-line-through"><del>$<?php echo $book['price'] + 1.0; ?></del></li>
                                </ul>
                            </div>
                            <ul class="rating d-flex justify-content-center">
                                <li class="me-1 color-orange fa fa-star"></li>
                                <li class="me-1 color-orange fa fa-star"></li>
                                <li class="me-1 color-orange fa fa-star"></li>
                                <li class="me-1 color-orange fa fa-star"></li>
                                <li class="fa fa-star"></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
                <div class="paginationlist text-center">
                    <ul class="text-center">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right" style="font-size: 13px;"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>