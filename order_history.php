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
            
            <form action="order_history.php" method="get">
                <div class="form-group search mb-3">
                    <span class="fa fa-search form-control-feedback"></span>
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchOrder" name="search" <?php if(isset($_GET['search'])) echo 'value="'.$_GET['search'].'"'; ?> placeholder="Search for order ID, email, or username">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit">Manual Filter</button>
                            <a class="btn btn-secondary" href="order_history.php">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
            
            <?php
            $limit = 25;
            if(isset($_GET["page"]))
                $page = $_GET["page"];
            else
                $page = 1;
            $start_from = ($page-1)*$limit;
            // Get all orders in the system or filtered
            if(isset($_GET['search'])) {
                $getOrdersSql = "SELECT * FROM orders "
                        . "WHERE order_id LIKE('%".$_GET['search']."%') "
                        . "OR username LIKE('%".$_GET['search']."%') "
                        . "OR email LIKE('%".$_GET['search']."%') "
                        . "ORDER BY order_id DESC LIMIT $start_from, $limit;";
            }
            else
                $getOrdersSql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT $start_from, $limit;";
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
                                $detailsSql = "SELECT book_isbn, book_title, quantity, subtotal FROM order_details WHERE order_id='".$row['order_id']."'";
                                $detailsResult = mysqli_query($conn,$detailsSql);
                                echo  '<tr class="order-summary" data-toggle="collapse" data-target="#orderno'.$row['order_id'].'" aria-expanded="true" aria-controls="#orderno'.$row['order_id'].'">'
                                        . '<th scope="row" class="order-id">#'.$row['order_id'].'</th>'
                                        . '<td class="email">'.$row['email'].'</td>'
                                        . '<td class="username">'.$row['username'].'</td>'
                                        . '<td>RM'.$row['total_price'].'</td>'
                                        . '<td class="date">'.date('d/m/Y',strtotime($row['order_date'])).'</td>'
                                    . '</tr>';
                                echo  '<tr class="order-details-row"><td class="p-0" colspan="5">'
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
                                                echo '<tr>'
                                                        . '<th scope="row">'.$detailsRow['book_title'].'</th>'
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
                        else {
                            echo '<tr>'
                                    . '<td colspan="5" class="text-center">No results!</td>'
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
                $countRowsSql = "SELECT COUNT(order_id) FROM orders "
                        . "WHERE order_id LIKE('%".$_GET['search']."%') "
                        . "OR username LIKE('%".$_GET['search']."%') "
                        . "OR email LIKE('%".$_GET['search']."%');";
            }
            else
                $countRowsSql = "SELECT COUNT(order_id) FROM orders;";
            $result_db = mysqli_query($conn, $countRowsSql);
            $row_db = mysqli_fetch_row($result_db);
            $total_records = $row_db[0];
            $total_pages = ceil($total_records / $limit);
            
            if($total_pages > 1) {
                $pagLink = "<ul class='pagination mb-4'>";
                for($i=1; $i<=$total_pages; $i++) {
                    if(isset($_GET['search'])) {
                        if($page == $i)
                            $pagLink .= "<li class='page-item active-page'><a class='page-link' href='order_history.php?page=".$i."&search=".$_GET['search']."'>".$i."</a></li>";
                        else
                            $pagLink .= "<li class='page-item'><a class='page-link' href='order_history.php?page=".$i."&search=".$_GET['search']."'>".$i."</a></li>";
                    }
                    else {
                        if($page == $i)
                            $pagLink .= "<li class='page-item active-page'><a class='page-link' href='order_history.php?page=".$i."'>".$i."</a></li>";
                        else
                            $pagLink .= "<li class='page-item'><a class='page-link' href='order_history.php?page=".$i."'>".$i."</a></li>";
                    }
                }
                echo $pagLink . "</ul>";
            }
            ?>
            
        </div>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('#searchOrder').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('#ordersTable .order-summary').filter(function() {
                        $(this).toggle($(this).find('.order-id, .email, .username').text().toLowerCase().indexOf(value) > -1); // Update find() after table is implemented
                    });
                    $('.collapse').collapse('hide');
                });
            });
        </script>
    </body>
    
    <?php
    include 'modules/footer.php';
    ?>
    
</html>
