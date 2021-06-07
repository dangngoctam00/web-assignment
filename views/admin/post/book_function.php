<?php
    $action = isset($_POST['action']) ? $_POST['action'] : "";

    require_once "../../../data/config.php";
    
    if ($action == "delete_book"){
        $id = $_POST['id'];        
        deleteBook($mysql_db,$id);
    }

    if ($action == "delete_review"){
        $book_id = $_POST['book_id'];
        $customer_id = $_POST['customer_id'];        
        deleteReview($mysql_db,$book_id, $customer_id);
    }

    if ($action == "edit_book"){
        $id= $_POST['id'];
        $name= $_POST['name'];
        $authors= $_POST['author'];
        $category= $_POST['category'];
        $price= $_POST['price'];
        $description= $_POST['description'];
        $image= $_POST['image'];
        $sql = "update book set name = '$name', category = '$category',
                price = '$price', description = '$description', link_image = '$image' where id = $id";
        $res = $mysql_db->query($sql);
        $sql = "delete from written_by where book_id = $id";
        $res = $res && $mysql_db->query($sql);
        foreach($authors as $author) {
            $sql = "insert into written_by(book_id, author) values($id, '$author')";
            $res = $res && $mysql_db->query($sql);
        }
        if ($res) echo "Change book information successfully!";
        else echo "Change book information field!";
    }

    if ($action == 'add_book') {        
        $name= $_POST['name'];
        $authors= $_POST['author'];
        $category= $_POST['category'];
        $price= $_POST['price'];
        $description= $_POST['description'];
        $image= $_POST['image'];        
        $sql = "insert into book(name, category, price, description, link_image, published_at) 
                values(?,?,?,?,?,?)";
                // '$name', '$category', '$price', '$description', '$image', 'now()'
        $stmt = mysqli_prepare($mysql_db, $sql);
        $published_at = date('Y-m-d');
        mysqli_stmt_bind_param($stmt, 'ssssss', $name, $category, $price, $description, $image, $published_at);
        mysqli_stmt_execute($stmt);
        $id = $mysql_db->insert_id;
        $res = true;
        foreach($authors as $author) {
            $sql = "insert into written_by(book_id, author) values($id, '$author')";
            $res = $res && $mysql_db->query($sql);
        }
        if ($res) echo "Add new book successfully!";
        else echo "Add new book failed";
        
    }

    function deleteBook($mysql_db,$id){
        $sql = "delete from book where id = $id";    
        $res = $mysql_db->query($sql);
        if ($res) echo "Delete book successfully!";
        else echo "Delete book unsuccessfully!";
    }

    function deleteReview($mysql_db, $book_id, $customer_id) {
        $sql = "delete from reviewed_by where book_id = $book_id and customer_id = $customer_id";    
        $res = $mysql_db->query($sql);
        if ($res) echo "Delete review successfully!";
        else echo "Delete review unsuccessfully!";
    }

?>