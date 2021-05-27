<html>   
    <head>
        <meta charset="UTF-8">
        <title>Update Book</title>
    </head>
    
    <?php
        require '../modules/dbconnect.php';
    ?>
    
    <?php
        $target = $_POST["target_isbn"];
        $imgUrlNew = $_POST["img_link"];
        $titleNew = $_POST["title"];
        $authorNew = $_POST["author"];
        $dateNew = $_POST["date"];
        $descNew = $_POST["description"];
        $tradeNew = $_POST["number_trade"];
        $retailNew = $_POST["number_retail"];
        $qtyNew = $_POST["number_qty"];
        
        $updateSQL = 'UPDATE book '
                    . 'SET title="'.$titleNew.'", picture="'.$imgUrlNew.'", author="'.$authorNew.'", publish_date="'.$dateNew.'", description="'.$descNew.'", trade_price='.$tradeNew.', retail_price='.$retailNew.', quantity='.$qtyNew.
                    ' WHERE isbn='.$target;
        
        $result = $conn->query($updateSQL);
        if($conn->affected_rows > 0){
            header('Location:../edit_book.php?status=success&isbn='.$target);
        }
        else{
            header('Location:../edit_book.php?status=fail&isbn='.$target);
        }
        exit;
        $conn->close();
    ?>
    
    <body>
        
    </body>
    
</html>
