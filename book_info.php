<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Profile</title>
        
        <?php
        require 'modules/link.php';
        ?>
        
        <link rel="stylesheet" type="text/css" href="modules/book_info.css">
    </head>
    
    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    
    $isbn = $_GET['isbn'];
    
    $bookInfoSql = "SELECT * FROM book WHERE isbn='$isbn';";
    $bookInfoResult = mysqli_query($conn,$bookInfoSql);
    $bookRow = mysqli_fetch_assoc($bookInfoResult);
    ?>
    
    <body>
        <div class="container">
            <!-- put all your code here -->
        </div>
    </body>
    
    <?php
    include 'modules/footer.php';
    ?>
    
</html>