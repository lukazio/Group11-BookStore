<?php
class AddstockStocklevelsIntegration {
    function performTest($isbn, $title, $author, $date, $description, $img_link, $price_trade, $price_retail, $quantity, $search) {
        $addBookResult = $this->addStockaddBook($isbn, $title, $author, $date, $description, $img_link, $price_trade, $price_retail, $quantity);
        if($addBookResult) {
            $bookSearchResult = $this->stockLevelsBookSearch($search);
            if($bookSearchResult)
                return true;
        }
        return false;
    }
    
    function addStockaddBook($isbn, $title, $author, $date, $description, $img_link, $price_trade, $price_retail, $quantity) {
        require '../modules/dbconnect.php';

        // Check for empty required input fields
        if(empty($isbn) || empty($title) || empty($author) || empty($date) || empty($price_trade) || empty($price_retail) || empty($quantity))
            return false;
        else {
            // Check if ISBN-13 number is duplicate or not
            $checkIsbnSql = "SELECT isbn FROM book WHERE isbn='$isbn' LIMIT 1;";
            $checkIsbnResult = mysqli_fetch_assoc(mysqli_query($conn,$checkIsbnSql));

            if($checkIsbnResult)
                return false;
            else if(!preg_match("/^97[89](\d{9}(?:\d|X))$/", $isbn))
                return false;
            else {
                $insertBookSql = "INSERT INTO book(isbn, title, author, publish_date, description, picture, trade_price, retail_price, quantity) "
                               . "VALUES('$isbn','".mysqli_real_escape_string($conn,$title)."','".mysqli_real_escape_string($conn,$author)."','$date','".mysqli_real_escape_string($conn,$description)."','$img_link','$price_trade','$price_retail','$quantity');";
                $conn->query($insertBookSql);

                $conn->close();
                return true;
            }
        }
        return false;
    }
    
    function stockLevelsBookSearch($search) {
        require '../modules/dbconnect.php';
        
        if(isset($search)) {
            $getBooksSql = "SELECT * FROM book "
                    . "WHERE isbn LIKE('%".$search."%') "
                    . "OR title LIKE('%".$search."%') "
                    . "ORDER BY isbn;";
        }
        $getBooksResult = mysqli_query($conn,$getBooksSql);
        
        if(mysqli_num_rows($getBooksResult) > 0)
            return true;
        else
            return false;
    }
}
