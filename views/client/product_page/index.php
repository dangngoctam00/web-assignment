<?php 
    session_start();
    require("../../../data/Product.php");
    // Get categories data
    $categoriesDetail = $product->getCategoriesDetail();

    // Get book data    
    $books = null;

    if (empty($_GET['category']) && empty($_GET['keyword']) && empty($_GET['orderbyprice'])) {
        $books = $product->getData();
    }
    elseif(!empty($_GET['category']) && empty($_GET['keyword']) && empty($_GET['orderbyprice'])) {
        $books = $product->getBookCategory($_GET['category']);
    }
    elseif(empty($_GET['category']) && !empty($_GET['keyword']) && empty($_GET['orderbyprice'])) {
        $books = $product->search($_GET['keyword']);
    }
    elseif (empty($_GET['category']) && empty($_GET['keyword']) && !empty($_GET['orderbyprice'])) {
        $books = $product->getBooksOrderByPrice($_GET['orderbyprice']);
    }
    elseif(empty(!$_GET['category']) && empty($_GET['keyword']) && !empty($_GET['orderbyprice'])) {
        $books = $product->getBooksByCategoryAndOrderByPrice($_GET['category'], $_GET['orderbyprice']);
    }
    elseif(empty($_GET['category']) && !empty($_GET['keyword']) && !empty($_GET['orderbyprice'])) {
        $books = $product->getBooksByKeywordAndOrderByPrice($_GET['keyword'], $_GET['orderbyprice']);
    }


    
    // if (!empty($_GET['orderbyprice'])) {
    //     $books = $product->getBooksOrderByPrice($_GET['orderbyprice']);
    // }
    // if (isset($_GET['category'])) {
    //     $category = $_GET['category'];
    //     $books = $product->getBookCategory($category);
    // } elseif (!empty($_GET['keyword'])) {
    //     $keyword = $_GET['keyword'];
    //     echo $keyword;
    //     $books = $product->search($keyword);
    // }
    // elseif (empty($_GET['category']) && empty($_GET['keyword']) && empty($_GET['orderbyprice'])) {
    //     $books = $product->getData();
    // }
    
    // shuffle($books);

    // For pagination
    // Number of items to display in one page
    $no_of_records_per_page = 6;
    $total_pages = ceil(count($books)/$no_of_records_per_page);
    // Current Page
    if (isset($_GET['page'])) {
        $page_no = $_GET['page'];
        if ($page_no > $total_pages) $page_no = $total_pages;
        if ($page_no < 1) $page_no = 1;
    }
    else $page_no = 1;
    $offset = ($page_no - 1)*$no_of_records_per_page;
    $books = array_slice($books, $offset, $no_of_records_per_page);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Product page</title>
    <?php 
        include('../include/stylesheet.php'); 
        include('../include/script.php');
    ?>

</head>

<body>
    <?php include( "../include/header.php"); ?>
    <?php include("./main.php"); ?>
    <?php include("../include/footer.php"); ?>
</body>

</html>