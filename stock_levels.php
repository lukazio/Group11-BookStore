<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stock Levels - Admin</title>
        
        <?php
        require 'modules/link.php';
        ?>
        
        <link rel="stylesheet" type="text/css" href="modules/stock_levels.css">
        <link rel="stylesheet" type="text/css" href="modules/loader.css">
    </head>
    
    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    ?>
    
    <body class="bg-dark">
        <div class="container text-white">
            <h1 class="py-4 font-weight-light">Welcome, Administrator.</h1>
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3>Stock Levels</h3>
                </div>
                <div class="col-12 col-md-6 text-md-right">
                    <span><a class="btn btn-info" href="order_history.php"><i class="fa fa-clock-o"></i>&nbsp; Orders</a></span>
                    <span class="ml-1"><a class="btn btn-success" href="add_stock.php"><i class="fa fa-plus"></i>&nbsp; Add Stock</a></span>
                </div>
            </div>
            
            <hr>
            
            <form action="stock_levels.php" method="get">
                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-append">
                            <div class="btn-group-toggle" data-toggle="buttons">
                                <label id="quickSearchContainer" class="btn btn-secondary quicksearch-toggle" data-toggle="tooltip" data-placement="top" title="Toggle Quicksearch">
                                    <input id="quickSearch" type="checkbox" autocomplete="off"><i class="fa fa-search"></i>
                                </label>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="searchStock" name="search" <?php if(isset($_GET['search'])) echo 'value="'.$_GET['search'].'"'; ?> placeholder="Search for book title or ISBN in system">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit">Manual Filter</button>
                            <a class="btn btn-secondary" href="stock_levels.php">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
            
            <div id="loader" class="loader">Loading...</div>
            
            <div id="stockLevelsList" style="visibility: hidden;">
                <?php
                $limit = 15;
                if(isset($_GET["page"]))
                    $page = $_GET["page"];
                else
                    $page = 1;
                $start_from = ($page-1)*$limit;
                // Get all orders in the system or filtered
                if(isset($_GET['search'])) {
                    $getBooksSql = "SELECT * FROM book "
                            . "WHERE isbn LIKE('%".$_GET['search']."%') "
                            . "OR title LIKE('%".$_GET['search']."%') "
                            . "ORDER BY title LIMIT $start_from, $limit;";
                }
                else
                    $getBooksSql = "SELECT * FROM book ORDER BY title LIMIT $start_from, $limit;";
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
                                            . '<td><img class="book-img" src="'.$row['picture'].'" height="70"></td>'
                                            . '<td class="isbn">'.$row['isbn'].'</td>'
                                            . '<td class="title">'.$row['title'].'</td>';
                                    if($row['quantity'] > 5)
                                        echo  '<td><span class="badge badge-light">'.$row['quantity'].'</span></td>';
                                    else
                                        echo  '<td><span class="badge badge-danger">'.$row['quantity'].'</span></td>';
                                    echo      '<td class="text-right">'
                                                . '<div class="btn-group">'
                                                    . '<a href="edit_book.php?isbn='.$row['isbn'].'" class="btn btn-info"><i class="fa fa-pencil"></i>&nbsp; Details</a>'
                                                    . '<button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>'
                                                    . '<div class="dropdown-menu dropdown-menu-right py-1">'
                                                        . '<form action="action/delete_book_action.php" method="post">'
                                                            . '<input type="hidden" name="deletebook_submit" value="'.$row['isbn'].'">'
                                                            . '<button type="button" class="btn btn-link text-danger py-0 btn-delete-book"><i class="fa fa-times"></i>&nbsp; Delete</button>'
                                                        . '</form>'
                                                    . '</div>'
                                                . '</div>'
                                            . '</td>';
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

                <?php
                $result_db;
                $countRowsSql;
                if(isset($_GET['search'])) {
                    $countRowsSql = "SELECT COUNT(isbn) FROM book "
                            . "WHERE isbn LIKE('%".$_GET['search']."%') "
                            . "OR title LIKE('%".$_GET['search']."%');";
                }
                else
                    $countRowsSql = "SELECT COUNT(isbn) FROM book;";
                $result_db = mysqli_query($conn, $countRowsSql);
                $row_db = mysqli_fetch_row($result_db);
                $total_records = $row_db[0];
                $total_pages = ceil($total_records / $limit);

                if($total_pages > 1) {
                    $pagLink = "<ul class='pagination mb-4'>";
                    for($i=1; $i<=$total_pages; $i++) {
                        if(isset($_GET['search'])) {
                            if($page == $i)
                                $pagLink .= "<li class='page-item active-page'><a class='page-link' href='stock_levels.php?page=".$i."&search=".$_GET['search']."'>".$i."</a></li>";
                            else
                                $pagLink .= "<li class='page-item'><a class='page-link' href='stock_levels.php?page=".$i."&search=".$_GET['search']."'>".$i."</a></li>";
                        }
                        else {
                            if($page == $i)
                                $pagLink .= "<li class='page-item active-page'><a class='page-link' href='stock_levels.php?page=".$i."'>".$i."</a></li>";
                            else
                                $pagLink .= "<li class='page-item'><a class='page-link' href='stock_levels.php?page=".$i."'>".$i."</a></li>";
                        }
                    }
                    echo $pagLink . "</ul>";
                }
                ?>
            </div>
        </div>
        
        <script type="text/javascript">
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
            
            $(document).ready(function() {
                $('#stockLevelsList').removeAttr('style');
                $('#loader').hide();
                
                $('#searchStock').on('keyup', function() {
                    if($('#quickSearch:checked').length > 0) {
                        var value = $(this).val().toLowerCase();
                        $('#stockTable tr').filter(function() {
                            $(this).toggle($(this).find('.title, .isbn').text().toLowerCase().indexOf(value) > -1);
                        });
                    }
                });
                
                $('#quickSearchContainer').on('click', function() {
                    setTimeout(function() {
                        if($('#quickSearch:checked').length > 0) {
                            var value = $('#searchStock').val().toLowerCase();
                            $('#stockTable tr').filter(function() {
                                $(this).toggle($(this).find('.title, .isbn').text().toLowerCase().indexOf(value) > -1);
                            });
                        }
                        else {
                            $('#stockTable tr').filter(function() {
                                $(this).toggle($(this).find('.title, .isbn').text().toLowerCase().indexOf('') > -1);
                            });
                        }
                    }, 1);
                });
                
                $('.btn-delete-book').on('click', function(e){
                    var $form = $(this).closest('form');
                    
                    Swal.fire({
                        icon: 'warning',
                        title: 'Confirm book deletion?',
                        text: 'Once this book is deleted, it cannot be restored!',
                        showCancelButton: true,
                        confirmButtonText: 'Delete',
                        confirmButtonColor: '#d9534f',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true
                    }).then((result) => {
                        if(result.value){
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleting book...',
                                showConfirmButton: false
                            });
                            $form.submit();
                        }
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
