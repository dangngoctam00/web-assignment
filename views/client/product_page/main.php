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
                            <?php foreach ($categoriesDetail as $category) { ?>
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
                <?php
                    // $url = '';
                    // if (!empty($_GET['category'])) {
                    //     $url = $url . 'category=' . $_GET['category'];
                    // }
                    // if (!empty($_GET['keyword'])) {
                    //     if ($url != ''){
                    //         $url = $url . '&keyword=' . $_GET[''];
                    //     }
                    // }
                ?>
                <form method="GET" action="" class="sort-bar">
                    <span class="sort-bar__label mb-2">Order by</span>
                    <div class="sort-by-options mb-1">
                        <!-- <div class="sort-by-options__option sort-by-options__option--selected">New</div> -->
                        <!-- <div class="sort-by-options__option">Bán chạy</div> -->
                        <div>
                            <div class="select-with-status">
                                <div class="select-with-status__holder select-with-status__box-shadow">
                                    <select name="oderbyprice" class="select-with-status__placeholder select-option">
                                        <option class="dnt-option" value="price">Price</option>
                                        <option class="dnt-option" value="asc">Sort ascending</option>
                                        <option class="dnt-option" value="desc">Sort descending</option>
                                    </select>
                                    <!-- <span><svg viewBox="0 0 10 6" class="svg-icon icon-arrow-down-small">
                                            <path d="M9.7503478 1.37413402L5.3649665 5.78112957c-.1947815.19574157-.511363.19651982-.7071046.00173827a.50153763.50153763 0 0 1-.0008702-.00086807L.2050664 1.33007451l.0007126-.00071253C.077901 1.18820749 0 1.0009341 0 .79546595 0 .35614224.3561422 0 .7954659 0c.2054682 0 .3927416.07790103.5338961.20577896l.0006632-.00066318.0226101.02261012a.80128317.80128317 0 0 1 .0105706.0105706l3.3619016 3.36190165c.1562097.15620972.4094757.15620972.5656855 0a.42598723.42598723 0 0 0 .0006944-.00069616L8.6678481.20650022l.0009529.0009482C8.8101657.07857935 8.9981733 0 9.2045341 0 9.6438578 0 10 .35614224 10 .79546595c0 .20495443-.077512.39180497-.2048207.53283641l.0003896.00038772-.0096728.00972053a.80044712.80044712 0 0 1-.0355483.03572341z" fill-rule="nonzero"></path>
                                        </svg>
                                    </span> -->
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="result-btn sort-by-options__option sort-by-options__option--selected">Result</button>                   
                </form>
                <div class="product-list row mt-5">
                    <?php foreach ($books as $book) { ?>
                        <div class="product text-center col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                            <div class="product-thumbnail">
                                <a href="../detail_book_page/index.php?id=<?php echo $book['id']; ?>"><img style="max-height: 210px;" src="<?php echo $book['link_image'] ?>" alt="product<?php echo $book['id']; ?>" class="img-fluid">
                                </a>
                                <div class="hot-box" <?php if ($book['is_bestseller'] == 0) echo "hidden"; ?>>
                                    <span class="hot-label">BEST SELLER</span>
                                </div>
                            </div>
                            <div class="product-content text-center pt-3 pb-1 px-2">
                                <h6 title="<?php echo $book['name']; ?>"><?php echo $book['name']; ?></h6>
                                <ul class="price d-flex justify-content-center mt-1">
                                    <li class="color-orange mr-5 fw-bold">$<?php echo $book['price']; ?></li>
                                    <li class="fw-bold text-decoration-line-through"><del>$<?php echo $book['price'] + 1.0; ?></del></li>
                                </ul>
                            </div>
                            <?php 
                                $query = "SELECT quality FROM reviewed_by WHERE book_id= {$book['id']}";
                                $result = $mysql_db->query($query);
                                $arrayResult = array();
                                while ($item = mysqli_fetch_assoc($result)) {
                                    $arrayResult[] = $item;
                                }
                                $quality  = 0;
                                foreach ($arrayResult as $item) {
                                    $quality += $item['quality'];
                                }
                                $numberOfReview = count($arrayResult) ? count($arrayResult) : 1;
                                $quality = ceil($quality/$numberOfReview);
                            ?>
                            <ul class="rating d-flex justify-content-center">
                                <li class="<?php echo $quality >= 1? "me-1 color-orange ": '' ?>fa fa-star"></li>
                                <li class="<?php echo $quality >= 2? "me-1 color-orange ": '' ?>fa fa-star"></li>
                                <li class="<?php echo $quality >= 3? "me-1 color-orange ": '' ?>fa fa-star"></li>
                                <li class="<?php echo $quality >= 4? "me-1 color-orange ": '' ?>fa fa-star"></li>
                                <li class="<?php echo $quality >= 5? "me-1 color-orange ": '' ?>fa fa-star"></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
                <div class="paginationlist text-center">
                    <ul class="pagination justify-content-center align-content-center">
                        <li class="page-item" <?php if ($page_no == 1) echo "hidden"; ?>>
                            <a href="<?php echo "?page=" . ($page_no - 1); ?>" class="number-page-<?php $a = $page_no - 1; echo $a; ?> page-link">
                                < </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item <?php if ($i == $page_no) echo "active"; ?>">
                                <a href="<?php echo "?page=" . $i; ?>" class="number-page-<?php echo $i; ?> page-link"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                        <li class="page-item" <?php if ($page_no == $total_pages) echo "hidden"; ?>>
                            <a href="<?php echo "?page=" . ($page_no + 1); ?>" class="number-page-<?php $a = $page_no - 1; echo $a; ?> page-link"> > </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $("*[class^='number-page-']").click(function(event) {
        let page_number = this.className.split(' ')[0].split('-');
        page_number = page_number[page_number.length - 1];
        // alert(page_number);
        let pathname =  $(location).attr('href');
        pathname = decodeURIComponent(pathname);
        if (pathname.indexOf('?') == -1) {
            $(location).attr('href',  pathname + '?page=' + page_number);               
        }
        else if (pathname.indexOf('page=') != -1) {
            $(location).attr('href',  pathname.substr(0, pathname.length - 1) + page_number);
        }
        else {
            $(location).attr('href',  pathname + '&page=' + page_number);
        }        
        event.preventDefault();
        return false;
    });                      

    $('.result-btn').click(function(event) {
        let pathname =  $(location).attr('href');
        let criteria = $('.select-option').val();
        pathname = decodeURIComponent(pathname);
        if (criteria == 'price') {
                event.preventDefault();
                return false;
            }
        if (pathname.indexOf('?') == -1) {
            $(location).attr('href',  pathname + '?orderbyprice=' + criteria);               
        }
        else {
            let url_prefix = pathname.split('?')[0];
            let argsStr = pathname.split('?')[1];            
            argsStr = '&' + argsStr;
            let args = argsStr.split('&')[1];
            // alert(typeof args);
            let type_var = args.split('=')[0];
            let value_var = args.split('=')[1];
            // alert(pathname);
            // alert(url_prefix);
                       
            if (type_var == 'category') {                
                $(location).attr('href',  url_prefix + '?category=' + value_var + '&orderbyprice=' + criteria);
            }
            else if (type_var == 'keyword') {
                $(location).attr('href',  url_prefix + '?keyword=' + value_var + '&orderbyprice=' + criteria);
            }
        }
        
        // alert(argsStr);
        // alert(args);
        // let categoryStr = 'category=';
        // let indexOfCategory = pathname.indexOf(categoryStr);
        // let category = '';
        // if (indexOfCategory != -1) {
        //     category = pathname.slice(indexOfCategory + categoryStr.length, )
        // }
        // alert(decodeURIComponent(pathname));
        
        event.preventDefault();
        return false;
    });
</script>