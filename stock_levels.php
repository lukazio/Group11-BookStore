<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stock Levels - Admin</title>
        
        <?php
        require 'modules/link.php';
        ?>
    </head>
    
    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    ?>
    
    <body class="bg-dark">
        <div class="container text-white">
            <h1 class="py-4 font-weight-light">Welcome, Administrator.</h1>
            <h3>Stock Levels</h3>
            <hr style="border-color: white;">
            
            <div class="text-right">
                <a class="mb-3 btn btn-success"><i class="fa fa-plus"></i> Add Stock</a>
            </div>
            
            <input type="text" class="form-control mb-3" id="searchStock" name="searchStock" placeholder="Search book titles in stock...">
            
            <?php
            // Get all books in the system
            $getBooksSql = "SELECT * FROM book ORDER BY isbn;";
            $getBooksResult = mysqli_query($conn,$getBooksSql);
            ?>
            
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">ISBN-13</th>
                            <th scope="col">Title</th>
                            <th scope="col">Stock</th>
                            <th scope="col" class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($getBooksResult) > 0){
                            foreach($getBooksResult as $row){
                                echo  '<tr>'
                                        . '<td><img src="'.$row['picture'].'" height="80"></td>'
                                        . '<td>'.$row['isbn'].'</td>'
                                        . '<td>'.$row['title'].'</td>';
                                if($row['quantity'] > 3)
                                    echo  '<td><span class="badge badge-light">'.$row['quantity'].'</span></td>';
                                else
                                    echo  '<td><span class="badge badge-danger">'.$row['quantity'].'</span></td>';
                                echo      '<td class="text-right"><a href="book_details.php?isbn='.$row['isbn'].'" class="btn btn-info"><i class="fa fa-pencil"></i> Details</a></td>';
                            }
                        }
                        else{
                            echo  '<tr>'
                                    . '<td colspan="5" class="text-center">No books found in the system!</td>'
                                . '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    
    <?php
    include 'modules/footer.php';
    ?>
    
</html>