<?php 
    require("../../../data/Product.php");
    // Get categories data
    $categoriesDetail = $product->getCategoriesDetail();
    
    // Get book data
    $books = null;
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $books = $product->getBookCategory($category);
    } else $books = $product->getData();
    shuffle($books);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product page</title>
    <?php 
    include('../include/stylesheet.php'); ?>


</head>

<body>
    <?php include( "../include/header.php"); ?>
    <?php include("./main.php"); ?>
    <?php include("../include/footer.php"); ?>
    <?php include('../include/script.php'); ?>

</body>

</html>