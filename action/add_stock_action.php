<?php
if(isset($_POST['addstock_submit'])) {
    session_start();
    require '../modules/dbconnect.php';
    
    $isbn = trim($_POST['isbn']);
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $date = trim($_POST['date']);
    $description = $_POST['description'];
    $img_link = trim($_POST['img_link']);
    $price_trade = $_POST['number_trade'];
    $price_retail = $_POST['number_retail'];
    $quantity = $_POST['number_qty'];
            
    // Check for empty required input fields
    if(empty($isbn) || empty($title) || empty($author) || empty($date) || empty($price_trade) || empty($price_retail) || empty($quantity))
        $_SESSION['addstock_alert'] = 'danger'; // NOTE: 'danger' = fail, this is for alert Bootstrap colour
    else {
        // Check if ISBN-13 number is duplicate or not
        $checkIsbnSql = "SELECT isbn FROM book WHERE isbn='$isbn' LIMIT 1;";
        $checkIsbnResult = mysqli_fetch_assoc(mysqli_query($conn,$checkIsbnSql));
        
        if($checkIsbnResult)
            $_SESSION['addstock_alert'] = 'danger';
        else {
            $insertBookSql = "INSERT INTO book(isbn, title, author, publish_date, description, picture, trade_price, retail_price, quantity) "
                           . "VALUES('$isbn','$title','$author','$date','$description','$img_link','$price_trade','$price_retail','$quantity');";
            mysqli_query($conn,$insertBookSql);
            
            header("Location: ../add_stock.php");
            $_SESSION['addstock_alert'] = 'success';
            
            exit();
            $conn->close();
        }
    }
    
    header('Location:../add_stock.php');
}
else {
    header('Location:../home.php');
}
?>