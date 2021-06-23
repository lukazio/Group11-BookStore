<?php
if(isset($_POST['deletebook_submit'])){
    session_start();
    require '../modules/dbconnect.php';
    
    $deleteIsbn = $_POST['deletebook_submit'];
    
    // If book is still present, execute the delete query and return to stock_levels.php
    $deleteCheckSql = "SELECT isbn FROM book WHERE isbn='$deleteIsbn';";
    if(mysqli_num_rows(mysqli_query($conn,$deleteCheckSql)) > 0){
        $deleteBookSql = "DELETE FROM book WHERE isbn='$deleteIsbn';";
        mysqli_query($conn,$deleteBookSql);
    }
    
    header("Location: ../stock_levels.php");
}
else {
    header('Location:../home.php');
}
?>
