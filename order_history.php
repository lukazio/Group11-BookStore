<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Stock - Admin</title>
        
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
            <h3 class="pt-4">Order History<span class="float-right"><a class="mb-3 btn btn-info" href="stock_levels.php"><i class="fa fa-arrow-left"></i>&nbsp; Back</a></span></h3>
            
            <hr>
            
            <div class="form-group search mb-3">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" id="searchStock" name="searchOrder" placeholder="Search for order history">
            </div>
            
        </div>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('#searchOrder').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('#ordersTable tr').filter(function() {
                        $(this).toggle($(this).find('.title, .isbn').text().toLowerCase().indexOf(value) > -1); // Update find() after table is implemented
                    });
                });
            });
        </script>
    </body>
    
    <?php
    include 'modules/footer.php';
    ?>
    
</html>
