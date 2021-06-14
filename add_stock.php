<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Stock - Admin</title>
        
        <?php
        require 'modules/link.php';
        ?>
        
        <link rel="stylesheet" type="text/css" href="modules/add_stock.css">
    </head>
    
    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    ?>
    
    <body class="bg-dark">
        <div class="container text-white">
            <h3 class="pt-4">Add Stock<span class="float-right"><a class="mb-3 btn btn-info" href="stock_levels.php"><i class="fa fa-arrow-left"></i>&nbsp; Back</a></span></h3>
            <hr>
            
            <!-- START OF ALERT -->
            <?php
            if(isset($_SESSION['addstock_alert'])) {
                $addstock_status = $_SESSION['addstock_alert'];
            ?>
                <div class="alert alert-<?php echo $addstock_status; ?> alert-dismissible fade show" role="alert">
                    <?php
                    if($addstock_status == 'success')
                        echo '<i class="fa fa-fw fa-check-circle"></i> Book successfully added! <a href="stock_levels.php">Click here</a> if you wish to return to previous page.';
                    else if($addstock_status == 'danger')
                        echo '<i class="fa fa-fw fa-exclamation-triangle"></i> Failed to add book, please ensure valid details and ISBN-13 number must not be a duplicate.';
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
            unset($_SESSION['addstock_alert']);
            ?>
            <!-- END OF ALERT -->
            
            <form action="action/add_stock_action.php" method="post" class="mb-4">
                <img id="bookImg" class="img-thumbnail mb-3" src="img/placeholder.png">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Image</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info"><i class="fa fa-picture-o text-white"></i></span>
                            </div>
                            <input type="url" class="form-control" name="img_link" placeholder="Image Link">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-info" id="imgPreviewBtn">Preview</button>
                                <button type="button" class="btn btn-secondary" id="imgResetBtn" data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Warning:</b> This will also clear the image link input!">Clear</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-7">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Book Title" required>
                    </div>
                    <div class="form-group col-12 col-md-5">
                        <label>Author</label>
                        <input type="text" class="form-control" name="author" placeholder="Book Author" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label>Publication Date</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label>ISBN-13</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Format:</b> First 97, then 8 or 9, then any 10 digits<br><b>Example:</b> 9786942013370"></i>
                        <input type="text" class="form-control" name="isbn" placeholder="ISBN-13 Number" pattern="97[89][0-9]{10}" required>
                    </div>
                    <div class="form-group col-12">
                        <label>Description</label>
                        <textarea class="form-control" rows="5" name="description" placeholder="Enter book description"></textarea>
                    </div>
                    
                    <h3 class="py-3 w-100">Prices & Quantity</h3>
                    
                    <div class="form-group col-12 mb-2">
                        <div class="input-group">
                            <label class="slider-label mb-0">Trade Price (RM)</label>
                            <input type="range" class="form-control p-0 ml-3 mr-4" id="rangeTrade" name="range_trade" min="0" max="500" value="0" oninput="this.form.number_trade.value=this.value" required>
                            <div class="input-group-append">
                                <input type="number" class="form-control" id="numberTrade" name="number_trade" min="0" max="500" value="0" oninput="this.form.range_trade.value=this.value" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12 mb-2">
                        <div class="input-group">
                            <label class="slider-label mb-0">Retail Price (RM)</label>
                            <input type="range" class="form-control p-0 ml-3 mr-4" id="rangeRetail" name="range_retail" min="0" max="500" value="0" oninput="this.form.number_retail.value=this.value" required>
                            <div class="input-group-append">
                                <input type="number" class="form-control" id="numberRetail" name="number_retail" min="0" max="500" value="0" oninput="this.form.range_retail.value=this.value" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-9 col-md-6 mb-0">
                        <div class="input-group">
                            <label class="slider-label mb-0">Quantity</label>
                            <input type="range" class="form-control p-0 ml-3 mr-4" id="rangeQty" name="range_qty" min="0" max="20" value="0" oninput="this.form.number_qty.value=this.value" required>
                            <div class="input-group-append">
                                <input type="number" class="form-control" id="numberQty" name="number_qty" min="0" max="20" value="0" oninput="this.form.range_qty.value=this.value" required>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-right">
                    <button type="submit" class="btn btn-success" name="addstock_submit"><i class="fa fa-floppy-o"></i>&nbsp; Submit</button>
                </div>
            </form>
        </div>
        
        <script type="text/javascript">
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });

            $(document).ready(function() {
                // Image preview
                var $oldImg = $('#bookImg').attr('src');

                $('#imgPreviewBtn').click(function() {
                    var $newImg = $('input[name=img_link]').val();
                    $('#bookImg').attr('src', $newImg);
                });
                $('#imgResetBtn').click(function() {
                    $('#bookImg').attr('src', $oldImg);
                    if($('#bookImg').attr('src') !== 'img/placeholder.png')
                        $('input[name=img_link]').val($oldImg);
                    else
                        $('input[name=img_link]').val('');
                });

                // Display image as placeholder image if specified image not found in link
                $('#bookImg').on('error', function(){
                    $(this).attr('src', './img/placeholder.png');
                });

                // Price and quantity range values limit auto correction
                $('#numberTrade').on('keyup', function(){
                    if($(this).val() > 500){
                        $(this).val(500);
                        $('#rangeTrade').val(500);
                    }
                    else if($(this).val() < 0){
                        $(this).val(0);
                        $('#rangeTrade').val(0);
                    }
                });
                $('#numberRetail').on('keyup', function(){
                    if($(this).val() > 500){
                        $(this).val(500);
                        $('#rangeRetail').val(500);
                    }
                    else if($(this).val() < 0){
                        $(this).val(0);
                        $('#rangeRetail').val(0);
                    }
                });
                $('#numberQty').on('keyup', function(){
                    if($(this).val() > 20){
                        $(this).val(20);
                        $('#rangeQty').val(20);
                    }
                    else if($(this).val() < 0){
                        $(this).val(0);
                        $('#rangeQty').val(0);
                    }
                });
            });
        </script>
    </body>
    
    <?php
    include 'modules/footer.php';
    ?>
    
</html>