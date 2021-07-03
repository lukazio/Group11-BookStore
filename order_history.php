<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Order History - Admin</title>
        
        <?php
        require 'modules/link.php';
        ?>
        
        <link rel="stylesheet" type="text/css" href="modules/order_history.css">
    </head>
    
    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    ?>
    
    <body class="bg-dark">
        <div class="container text-white">
            <div class="row pt-4">
                <div class="col-12 col-md-6">
                    <h3>Order History</h3>
                </div>
                <div class="col-12 col-md-6 text-md-right">
                    <span class="float-right"><a class="btn btn-info" href="stock_levels.php"><i class="fa fa-arrow-left"></i>&nbsp; Back</a></span>
                </div>
            </div>
            
            <hr>
            
            <div class="form-group search mb-3">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" id="searchOrder" name="searchOrder" placeholder="Search for order history">
            </div>
            
            <?php
            $limit = 20;  
            if(isset($_GET["page"]))
                $page = $_GET["page"];
            else
                $page = 1;
            $start_from = ($page-1)*$limit;
            // Get all orders in the system
            $getOrdersSql = "SELECT * FROM orders ORDER BY order_id LIMIT $start_from, $limit;";
            $getOrdersResult = mysqli_query($conn,$getOrdersSql);
            ?>
            
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-4">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Total</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody id="ordersTable">
                        <?php
                        if(mysqli_num_rows($getOrdersResult) > 0) {
                            foreach($getOrdersResult as $row) {
                                $userinfoSql = "SELECT email, username FROM user WHERE user_id='".$row['user_id']."';";
                                $detailsSql = "SELECT book_isbn, quantity, subtotal FROM order_details WHERE order_id='".$row['order_id']."'";
                                $userRow = mysqli_fetch_assoc(mysqli_query($conn,$userinfoSql));
                                $detailsResult = mysqli_query($conn,$detailsSql);
                                echo  '<tr data-toggle="collapse" data-target="#orderno'.$row['order_id'].'" aria-expanded="true" aria-controls="#orderno'.$row['order_id'].'">'
                                        . '<th scope="row" class="order-id">#'.$row['order_id'].'</th>'
                                        . '<td class="email">'.$userRow['email'].'</td>'
                                        . '<td class="username">'.$userRow['username'].'</td>'
                                        . '<td>RM'.$row['total_price'].'</td>'
                                        . '<td>'.date('d/m/Y',strtotime($row['order_date'])).'</td>'
                                    . '</tr>';
                                echo  '<tr><td class="p-0" colspan="5">'
                                        . '<div id="orderno'.$row['order_id'].'" class="collapse border-left border-right border-white">'
                                            . '<div class="order-details">'
                                                . '<p><b>'.date('d F Y, g:i a',strtotime($row['order_date'])).'</b></p>'
                                                . '<p class="small">'.$row['ship_address'].'</p>';
                                        if(mysqli_num_rows($detailsResult) > 0) {
                                            echo '<div class="small col-10 col-md-8 col-lg-6 p-0">'
                                               . '<table class="table table-dark table-sm m-0 book-details-table">';
                                                echo '<thead>'
                                                        . '<th scope="col">Book</th>'
                                                        . '<th scope="col">ISBN</th>'
                                                        . '<th scope="col">Quantity</th>'
                                                        . '<th scope="col">Subtotal</th>'
                                                   . '</thead>';
                                            foreach($detailsResult as $detailsRow) {
                                                $bookSql = "SELECT title FROM book WHERE isbn='".$detailsRow['book_isbn']."'";
                                                $bookRow = mysqli_fetch_assoc(mysqli_query($conn,$bookSql));
                                                echo '<tr>'
                                                        . '<th scope="row">'.$bookRow['title'].'</th>'
                                                        . '<td>'.$detailsRow['book_isbn'].'</td>'
                                                        . '<td>×'.$detailsRow['quantity'].'</td>'
                                                        . '<th scope="row">'.$detailsRow['subtotal'].'</th>'
                                                   . '</tr>';
                                            }
                                            echo '</table>'
                                               . '</div>';
                                        }
                                        else
                                            echo '<span class="small">ERROR: Products missing!</span>';
                                         echo '</div>'
                                        . '</div>'
                                    . '</td></tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <?php
            $result_db = mysqli_query($conn,"SELECT COUNT(order_id) FROM orders");
            $row_db = mysqli_fetch_row($result_db);
            $total_records = $row_db[0];
            $total_pages = ceil($total_records / $limit);
            $pagLink = "<ul class='pagination mb-4'>";
            
            for($i=1; $i<=$total_pages; $i++) {
                if($page == $i)
                    $pagLink .= "<li class='page-item active'><a class='page-link' href='order_history.php?page=".$i."'>".$i."</a></li>";
                else
                    $pagLink .= "<li class='page-item'><a class='page-link' href='order_history.php?page=".$i."'>".$i."</a></li>";
            }
            echo $pagLink . "</ul>";
            ?>
            
        </div>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('#searchOrder').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('#ordersTable tr').filter(function() {
                        $(this).toggle($(this).find('.order-id, .email, .username').text().toLowerCase().indexOf(value) > -1); // Update find() after table is implemented
                    });
                });
            });
        </script>
    </body>
    
    <?php
    include 'modules/footer.php';
    ?>
    
</html>
