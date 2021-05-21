<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stock Levels - Admin</title>
        
        <?php
        require 'modules/link.php';
        ?>
        
        <link rel="stylesheet" type="text/css" href="modules/stock_levels.css">
    </head>
    
    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    ?>
    
    <body class="bg-dark">
        <div class="container text-white">
            <h1 class="py-4 font-weight-light">Welcome, Administrator.</h1>
            <h3>
                Stock Levels
                <span class="float-right"><a class="mb-3 btn btn-success" href="add_stock.php"><i class="fa fa-plus"></i>&nbsp; Add Stock</a></span>
            </h3>
            <hr>
            
            <div class="form-group search mb-3">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" id="searchStock" name="searchStock" placeholder="Search for book title or ISBN in system">
            </div>
            
            <?php
            // Get all books in the system
            $getBooksSql = "SELECT * FROM book ORDER BY isbn;";
            $getBooksResult = mysqli_query($conn,$getBooksSql);
            ?>
            
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-4">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">ISBN-13</th>
                            <th scope="col">Title</th>
                            <th scope="col">Stock</th>
                            <th scope="col" class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody id="stockTable">
                        <?php
                        if(mysqli_num_rows($getBooksResult) > 0){
                            foreach($getBooksResult as $row){
                                echo  '<tr>'
                                        . '<td><img class="book-img" src="'.$row['picture'].'" height="65"></td>'
                                        . '<td class="isbn">'.$row['isbn'].'</td>'
                                        . '<td class="title">'.$row['title'].'</td>';
                                if($row['quantity'] > 3)
                                    echo  '<td><span class="badge badge-light">'.$row['quantity'].'</span></td>';
                                else
                                    echo  '<td><span class="badge badge-danger">'.$row['quantity'].'</span></td>';
                                echo      '<td class="text-right"><a href="book_details.php?isbn='.$row['isbn'].'" class="btn btn-info"><i class="fa fa-pencil"></i>&nbsp; Details</a></td>';
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
        
        <script type="text/javascript">
            $(document).ready(function(){
                $("#searchStock").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#stockTable tr").filter(function() {
                        $(this).toggle($(this).find(".title, .isbn").text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });

            $('.book-img').on('error', function(){
                $(this).attr('src', './img/placeholder.png');
            });
        </script>
    </body>
    
    <?php
    include 'modules/footer.php';
    ?>
    
</html>