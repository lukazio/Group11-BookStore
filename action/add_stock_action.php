<?php
if(isset($_POST['addstock_submit'])) {
    ini_set("mbstring.internal_encoding","UTF-8");
    ini_set("mbstring.func_overload",7);
    
    session_start();
    require '../modules/dbconnect.php';
    
    $isbn = trim($_POST['isbn']);
    $title = trim(htmlspecialchars($_POST['title']));
    $author = trim(htmlspecialchars($_POST['author']));
    $date = trim($_POST['date']);
    $description = $_POST['description'];
    $img_link = trim(htmlspecialchars($_POST['img_link']));
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
        else if(!preg_match("/^97[89](\d{9}(?:\d|X))$/", $isbn))
            $_SESSION['addstock_alert'] = 'danger';
        else {
            $insertBookSql = "INSERT INTO book(isbn, title, author, publish_date, description, picture, trade_price, retail_price, quantity) "
                           . "VALUES('$isbn','".mysqli_real_escape_string($conn,$title)."','".mysqli_real_escape_string($conn,$author)."','$date','".mysqli_real_escape_string($conn,$description)."','$img_link','$price_trade','$price_retail','$quantity');";
            $conn->query($insertBookSql);
            
            header("Location: ../add_stock.php");
            $_SESSION['addstock_alert'] = 'success';
            
            $conn->close();
            exit();
        }
    }
    
    header('Location:../add_stock.php');
}
else {
    header('Location:../home.php');
}
?>
