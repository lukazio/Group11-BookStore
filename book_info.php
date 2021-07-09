<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Book Information</title>
        
        <?php
        require 'modules/link.php';
        ?>
        
        <link rel="stylesheet" type="text/css" href="modules/book_info.css">
    </head>
    
    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    
    if(!isset($_GET['isbn'])){
        header('Location: home.php');
        exit();
    }
    
    $isbn = $_GET['isbn'];
    
    $bookInfoSql = "SELECT * FROM book WHERE isbn='$isbn';";
    $bookInfoResult = mysqli_query($conn,$bookInfoSql);
    $bookRow = mysqli_fetch_assoc($bookInfoResult);
    ?>
    
    <body class="body-bg">
        <div class="container">
            <div class="back-link">
                <a href="home.php" class="small"><i class="fa fa-fw fa-angle-left"></i> Back</a>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 text-center left-column pr-0">
                    <div class="card">
                        <img class="img-preview" src="<?php echo $bookRow['picture']; ?>">
                    </div>
                    <div class="card text-left mb-0">
                        <h4 class="mb-4">Description</h4>
                        <p id="descCollapse" class="m-0 text-justify" aria-expanded="false"><?php echo nl2br($bookRow['description']); ?></p>
                        <a id="collapseBtn" role="button" class="collapsed collapse-btn mt-4 orange" data-toggle="collapse" href="#descCollapse" aria-expanded="false" aria-controls="descCollapse"></a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 text-center right-column pl-0">
                    <div class="sticky">
                        <div class="card text-left">
                            <h3><?php echo $bookRow['title']; ?></h3>
                            <?php
                            if($bookRow['quantity'] > 0)
                                echo '<h5 class="mb-3"><span class="badge badge-orange">In Stock</span></h5>';
                            else
                                echo '<h5 class="mb-3"><span class="badge badge-danger">Out of Stock</span></h5>';
                            ?>
                            <p class="orange m-0"><?php echo $bookRow['author']; ?></p>

                            <hr class="card-separator">

                            <div class="product-info-table d-table">
                                <div class="d-table-row">
                                    <div class="d-table-cell"><span class="h6">Price:</span></div>
                                    <div class="d-table-cell w-100 pl-3">
                                        <h4 class="font-weight-normal orange d-block m-0">RM<?php echo $bookRow['retail_price']; ?></h4>
                                    </div>
                                </div>
                                <div class="d-table-row">
                                    <div class="d-table-cell"><span class="h6">Stock:</span></div>
                                    <div class="d-table-cell w-100 pl-3">
                                        <?php
                                        if($bookRow['quantity'] <= 5)
                                            echo '<span class="font-weight-bold text-red"><span class="small"><i class="fa fa-fw fa-circle"></i></span>&nbsp; Only '.$bookRow['quantity'].' unit(s) left</span>';
                                        else
                                            echo '<span class="font-weight-bold text-success"><span class="small"><i class="fa fa-fw fa-circle"></i></span>&nbsp; In stock with '.$bookRow['quantity'].' unit(s)</span>';
                                        ?>
                                    </div>
                                </div>
                                <div class="d-table-row">
                                    <div class="d-table-cell"><span class="h6">Quantity:</span></div>
                                    <div class="d-table-cell w-100 pl-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button id="decQty" type="button" class="btn btn-outline-secondary btn-qty"><span class="small"><i class="fa fa-fw fa-minus"></i></span></button>
                                            </div>
                                            <?php
                                            if($bookRow['quantity'] > 0)
                                                echo '<input type="number" id="bookQty" class="book-qty form-control text-center" value="1" readonly="readonly">';
                                            else
                                                echo '<input type="number" id="bookQty" class="book-qty form-control text-center" value="0" readonly="readonly">';
                                            ?>
                                            <div class="input-group-append">
                                                <button id="incQty" type="button" class="btn btn-outline-secondary btn-qty"><span class="small"><i class="fa fa-fw fa-plus"></i></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <?php
                                $cart_qty = 0;
                                if(isset($_COOKIE['cart'])){
                                    $tempCart = json_decode($_COOKIE['cart'], true);
                                    foreach ($tempCart as $id => $props) {
                                        if($props['isbn'] == $bookRow['isbn']){
                                            $cart_qty = $tempCart[$id]['amt'];
                                            break;
                                        }
                                    }
                                }

                                if($bookRow['quantity'] > 0){
                                    if($cart_qty >= $bookRow['quantity'])
                                        echo '<button type="button" class="btn btn-secondary btn-block" disabled="disabled"><i class="fa fa-fw fa-shopping-cart"></i> All Stock in Cart</button>';
                                    else
                                        echo '<button id="addToCart" type="button" class="btn btn-warning btn-block"><i class="fa fa-fw fa-shopping-cart"></i> Add to Cart</button>';
                                }
                                else
                                    echo '<button type="button" class="btn btn-secondary btn-block" disabled="disabled"><i class="fa fa-fw fa-shopping-cart"></i> Sold Out</button>';
                                ?>
                            </div>
                        </div>
                        <div class="card text-left">
                            <p class="mb-2"><span class="h6">Product Details:</span></p>
                            <p class="mb-2"><span class="h6">Author:</span> <?php echo $bookRow['author']; ?></p>
                            <p class="mb-2"><span class="h6">ISBN:</span> <?php echo $bookRow['isbn']; ?></p>
                            <p class="mb-0"><span class="h6">Date:</span> <?php echo date('d/m/Y', strtotime($bookRow['publish_date'])); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                var $qty = $('#bookQty').val();
                var $max = <?php echo $bookRow['quantity']; ?>;
                
                $('#incQty').click(function(){
                    $qty++;
                    $('#bookQty').val($qty);
                    
                    if($('#bookQty').val() > $max){
                        $qty = $max;
                        $('#bookQty').val($max);
                    }
                });
                $('#decQty').click(function(){
                    $qty--;
                    $('#bookQty').val($qty);
                    
                    if($('#bookQty').val() <= 0){
                        $qty = 1;
                        $('#bookQty').val($qty);
                    }
                    if($max == 0){
                        $qty = 0;
                        $('#bookQty').val($qty);
                    }
                });
                
                var $line_height = parseInt($('#descCollapse').css('line-height'));
                var $desc_height = $('#descCollapse').height();
                var $line_count = $desc_height / $line_height;

                if($line_count > 6) {
                    $('#collapseBtn').show();
                    $('#descCollapse').addClass('collapse');
                }
                else {
                    $('#collapseBtn').hide();
                    $('#descCollapse').removeClass('collapse');
                }
                
                $('#addToCart').click(function(){
                    var isbn = <?php echo $_GET['isbn']; ?>;
                    var title = '<?php echo addslashes($bookRow['title']); ?>';
                    var pic = '<?php echo $bookRow['picture']; ?>';
                    var price = <?php echo $bookRow['retail_price']; ?>;
                    var quantity = parseInt($('#bookQty').val());
                    
                    var stock = parseInt(<?php echo $bookRow['quantity']; ?>);
                    var cart_qty = parseInt(<?php echo $cart_qty; ?>);
                    
                    if(quantity + cart_qty <= stock)
                        window.location.href = "action/book_info_action.php?isbn=" + isbn + "&title=" + title + "&pic=" + pic + "&price=" + price + "&quantity=" + quantity;
                    else if(stock - cart_qty > 0) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Quantity exceeded',
                            html: '<p>The total quantity in your cart and the selected amount has exceeded the stock quantity.</p><p class="m-0">Please choose an amount of <b>' + (stock - cart_qty) + '</b> or lower.</p>',
                            confirmButtonColor: '#f29d16'
                        });
                    }
                    else {
                        alert('The entire stock is already in your cart.');
                        Swal.fire({
                            icon: 'warning',
                            title: 'Out of stock',
                            text: 'The entire stock is already in your cart.',
                            confirmButtonColor: '#f29d16'
                        });
                    }
                });
            });
            
            $('.img-preview').on('error', function(){
                $(this).attr('src', './img/placeholder.png');
            });
        </script>
    </body>
    
    <?php
    include 'modules/footer.php';
    ?>
    
</html>
