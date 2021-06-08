<link rel="stylesheet" href="../../../assets/css/product_page/product.css">

<div class="product-page-banner text-center align-content-end align-middle">
    <div class="content" style="margin-top: 10.5%; padding-bottom: 12.5%;">
        <h1 class="title">4T STORE</h1>
        <div class="route">
            <a href="../home_page/index.php" style="color: #FFFFFF; font-style: italic;">Home</a> / <p class="d-inline" style="color: #CE7852; font-style: italic;">Books</p>
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
                            <li><a href="index.php">All<span class="float-right"> (<?php echo count($product->getData()); ?>)</span></a></li>
                            <?php foreach($categoriesDetail as $category) { ?>
                                <li><a href="index.php?category=<?php echo $category['name']; ?>"><?php echo ucwords($category['name']); ?><span class="float-right"> (<?php echo $category['number'] ?>)</span></a></li>
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
                
                <?php 
                if (!empty($keyword)) {
                    $nums = count($books);
                    print "<div class='search-result'>";
                        print "<svg viewBox='0 0 18 24' class='result-svg-icon icon-hint-bulb'><g transform='translate(-355 -149)'><g transform='translate(355 149)'><g fill-rule='nonzero' transform='translate(5.4 19.155556)'><path d='m1.08489412 1.77777778h5.1879153c.51164401 0 .92641344-.39796911.92641344-.88888889s-.41476943-.88888889-.92641344-.88888889h-5.1879153c-.51164402 0-.92641345.39796911-.92641345.88888889s.41476943.88888889.92641345.88888889z'></path><g transform='translate(1.9 2.666667)'><path d='m .75 1.77777778h2.1c.41421356 0 .75-.39796911.75-.88888889s-.33578644-.88888889-.75-.88888889h-2.1c-.41421356 0-.75.39796911-.75.88888889s.33578644.88888889.75.88888889z'></path></g></g><path d='m8.1 8.77777718v4.66666782c0 .4295545.40294373.7777772.9.7777772s.9-.3482227.9-.7777772v-4.66666782c0-.42955447-.40294373-.77777718-.9-.77777718s-.9.34822271-.9.77777718z' fill-rule='nonzero'></path><path d='m8.1 5.33333333v.88889432c0 .49091978.40294373.88888889.9.88888889s.9-.39796911.9-.88888889v-.88889432c0-.49091977-.40294373-.88888889-.9-.88888889s-.9.39796912-.9.88888889z' fill-rule='nonzero'></path><path d='m8.80092773 0c-4.86181776 0-8.80092773 3.97866667-8.80092773 8.88888889 0 1.69422221.47617651 3.26933331 1.295126 4.61333331l2.50316913 3.9768889c.30201078.4782222.84303623.7697778 1.42482388.7697778h7.17785139c.7077799 0 1.3618277-.368 1.7027479-.9617778l2.3252977-4.0213333c.7411308-1.2888889 1.1728395-2.7786667 1.1728395-4.37688891 0-4.91022222-3.9409628-8.88888889-8.80092777-8.88888889m0 1.77777778c3.82979317 0 6.94810087 3.18933333 6.94810087 7.11111111 0 1.24444441-.3168334 2.43022221-.9393833 3.51466671l-2.3252977 4.0213333c-.0166754.0284444-.0481735.0462222-.0833772.0462222h-7.07224026l-2.43461454-3.8648889c-.68184029-1.12-1.04128871-2.4053333-1.04128871-3.71733331 0-3.92177778 3.11645483-7.11111111 6.94810084-7.11111111'></path></g></g></svg>";
                        print "<span class='search-result-title'>Result for search keyword '<span class='search-keyword'>$keyword</span>' ($nums)</span>";    
                    print "</div>";
                } ?>
                <div class="product-list row">
                    <?php foreach($books as $book) {?>
                        <div class="product text-center col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                            <div class="product-thumbnail">
                                <a href="../detail_book_page/index.php?id=<?php echo $book['id']; ?>"><img style="max-height: 210px;" src="<?php echo $book['link_image']?>"
                                        alt="product<?php echo $book['id']; ?>" class="img-fluid">
                                </a>
                                <div class="hot-box" <?php if ($book['is_bestseller'] == 0) echo "hidden"; ?>>
                                    <span class="hot-label">BEST SALLER</span>
                                </div>
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
                    <ul class="pagination justify-content-center align-content-center">
                        <li class="page-item" <?php if ($page_no == 1) echo "hidden"; ?> >
                            <a href="<?php echo "?page=".($page_no - 1); ?>" class="page-link"> < </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?> 
                        <li class="page-item <?php if ($i == $page_no) echo "active"; ?>">
                            <a href="<?php echo "?page=".$i; ?>" class="page-link"><?php echo $i; ?></a>
                        </li>
                        <?php } ?>
                        <li class="page-item" <?php if ($page_no == $total_pages) echo "hidden"; ?> >
                            <a href="<?php echo "?page=".($page_no + 1); ?>" class="page-link"> > </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>