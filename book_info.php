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
    /* UN-COMMENT WHEN THIS PAGE IS DONE
    if(!isset($_GET['isbn'])){
        header('Location: home.php');
        exit();
    }*/
    
    $isbn = $_GET['isbn'];
    
    $bookInfoSql = "SELECT * FROM book WHERE isbn='$isbn';";
    $bookInfoResult = mysqli_query($conn,$bookInfoSql);
    $bookRow = mysqli_fetch_assoc($bookInfoResult);
    ?>
    
    <body>
        <div class="container">
            <div class="back-link">
                <a href="home.php" class="small"><i class="fa fa-fw fa-angle-left"></i> Back</a>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 text-center left-column pr-0">
                    <div class="card">
                        <img class="img-preview" src="<?php echo $bookRow['picture']; ?>">
                    </div>
                    <div class="card text-left">
                        <h4 class="mb-3">Description</h4>
                        <!-- TODO: If description too long, make it collapsible -->
                        <p class="m-0 text-justify"><?php echo nl2br($bookRow['description']); ?></p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 text-center right-column pl-0">
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
                                        <!-- TODO: Increment and decrement quantity with buttons -->
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-outline-secondary btn-qty"><span class="small"><i class="fa fa-fw fa-minus"></i></span></button>
                                        </div>
                                        <input type="number" id="bookQty" class="book-qty form-control text-center" value="1">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary btn-qty"><span class="small"><i class="fa fa-fw fa-plus"></i></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button id="addToCart" type="button" class="btn btn-warning btn-block"><i class="fa fa-fw fa-shopping-cart"></i> Add to Cart</button>
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
    </body>
    
    <?php
    include 'modules/footer.php';
    ?>
    
</html>