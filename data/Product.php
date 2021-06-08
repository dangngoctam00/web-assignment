<?php 
    require "config.php";
    class Product {
        public function getData($table = "book") {
            global $mysql_db;
            $query = "SELECT * FROM {$table}";
            $result = $mysql_db->query($query);
            $arrayResult = array();
            while ($item = mysqli_fetch_assoc($result)) {
                $arrayResult[] = $item;
            }
            return $arrayResult;
        }

        public function getBookCategory($category) {
            global $mysql_db;
            $table = "book";
            $category = strval($category);
            $query = "SELECT * FROM $table WHERE category=\"$category\"";
            $result = $mysql_db->query($query);
            $arrayResult = array();
            while ($item = mysqli_fetch_assoc($result)) {
                $arrayResult[] = $item;
            }
            return $arrayResult;
        }

        public function getCategoriesDetail() {
            global $mysql_db;
            $query = "SELECT x.category as name, COUNT(*) as number
                        FROM (
                            SELECT category FROM book
                        ) as x
                        GROUP BY x.category;";
            $result = $mysql_db->query($query);
            $arrayResult = array();
            while ($item = mysqli_fetch_assoc($result)) {
                $arrayResult[] = $item;
            }
            return $arrayResult;
        }

        public function search($keyword) {            
            global $mysql_db;
            $query = "SELECT * FROM book WHERE MATCH(name) AGAINST('$keyword')";
            $result = $mysql_db->query($query);
            $arrayResult = array();
            if (!empty($result)) {
                while ($item = mysqli_fetch_assoc($result)) {
                    $arrayResult[] = $item;
                }
            }
            return $arrayResult;
        }

        public function getBooksOrderByPrice($criteria) {
            global $mysql_db;
            if ($criteria == 'asc') {            
                $query = "SELECT * FROM book ORDER BY price ASC";
            }
            else {
                $query = "SELECT * FROM book ORDER BY price DESC";
            }
            $result = $mysql_db->query($query);
            $arrayResult = array();
            while ($item = mysqli_fetch_assoc($result)) {
                $arrayResult[] = $item;
            }
            return $arrayResult;
        }

        public function getBooksByCategoryAndOrderByPrice($category, $criteria) {
            global $mysql_db;
            if ($criteria == 'asc') {            
                $query = "SELECT * FROM book WHERE category = '$category' ORDER BY price ASC";
            }
            else {
                $query = "SELECT * FROM book WHERE category = '$category' ORDER BY price DESC";
            }
            $result = $mysql_db->query($query);
            $arrayResult = array();
            while ($item = mysqli_fetch_assoc($result)) {
                $arrayResult[] = $item;
            }
            return $arrayResult;
        }

        public function getBooksByKeywordAndOrderByPrice($keyword, $criteria) {
            global $mysql_db;
            if ($criteria == 'asc') {            
                $query = "SELECT * FROM book WHERE MATCH(name) AGAINST('$keyword') ORDER BY price ASC";
            }
            else {
                $query = "SELECT * FROM book WHERE MATCH(name) AGAINST('$keyword') ORDER BY price DESC";
            }
            $result = $mysql_db->query($query);
            $arrayResult = array();
            while ($item = mysqli_fetch_assoc($result)) {
                $arrayResult[] = $item;
            }
            return $arrayResult;
        }
    }

    $product = new Product();
?>