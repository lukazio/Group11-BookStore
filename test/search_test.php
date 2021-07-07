<?php
class Search {
    function searchBook($search) {
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
