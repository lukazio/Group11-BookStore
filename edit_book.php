<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="modules/add_stock.css" rel="stylesheet" type="text/css"/>
        <title>Admin Edit</title>
        
        <?php
            require 'modules/link.php';
        ?>
    </head>
    
    <?php
        require 'modules/dbconnect.php';
        include 'modules/header.php';
    ?>
    
    <body class="bg-dark">
        <?php
            //$isbn = $_GET['isbn'];
            $isbn = 69;
            $sql = 'SELECT * FROM book WHERE isbn="'.$isbn.'"';
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo'
                    <div class="container text-white">
                        <h3 class="pt-4">Edit Book '.$isbn.' Details<span class="float-right"><a class="mb-3 btn btn-info" href="stock_levels.php"><i class="fa fa-arrow-left"></i>&nbsp; Back</a></span></h3>
                        <hr>
                        
                        <div id="alert_box" class="hide" role="alert">
                            <h6 id="alert_msg"></h6>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span id="close_btn" hidden="true" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <form action="action/edit_book_action.php" method="post" class="mb-4" id="form">
                            <img id="bookImg" class="img-thumbnail mb-3" src="'.$row["picture"].'">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info"><i class="fa fa-picture-o text-white"></i></span>
                                        </div>
                                        <input type="url" class="form-control" name="img_link" placeholder="Image Link" value="'.$row["picture"].'">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-info" id="imgPreviewBtn">Preview</button>
                                            <button type="button" class="btn btn-secondary" id="imgResetBtn" data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Warning:</b> This will also revert the image link input!">Revert</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-7">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter New Title" value="'.$row["title"].'" required>
                                </div>
                                <div class="form-group col-12 col-md-5">
                                    <label>Author</label>
                                    <input type="text" class="form-control" name="author" placeholder="Enter New Author" value="'.$row["author"].'" required>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label>Publication Date</label>
                                    <input type="date" class="form-control" name="date" value="'.$row["publish_date"].'" required>
                                </div>
                                <div class="form-group col-12">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5" name="description" placeholder="Enter New Description">'.$row["description"].'</textarea>
                                </div>

                                <h3 class="py-3 w-100">Prices & Quantity</h3>

                                <div class="form-group col-12 mb-2">
                                    <div class="input-group">
                                        <label class="slider-label mb-0">Trade Price (RM)</label>
                                        <input type="range" class="form-control p-0 ml-3 mr-4" id="rangeTrade" name="range_trade" min="0" max="500" value="'.$row["trade_price"].'" oninput="this.form.number_trade.value=this.value" required>
                                        <div class="input-group-append">
                                            <input type="number" class="form-control" id="numberTrade" name="number_trade" min="0" max="500" value="'.$row["trade_price"].'" oninput="this.form.range_trade.value=this.value" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 mb-2">
                                    <div class="input-group">
                                        <label class="slider-label mb-0">Retail Price (RM)</label>
                                        <input type="range" class="form-control p-0 ml-3 mr-4" id="rangeRetail" name="range_retail" min="0" max="500" value="'.$row["retail_price"].'" oninput="this.form.number_retail.value=this.value" required>
                                        <div class="input-group-append">
                                            <input type="number" class="form-control" id="numberRetail" name="number_retail" min="0" max="500" value="'.$row["retail_price"].'" oninput="this.form.range_retail.value=this.value" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-9 col-md-6 mb-0">
                                    <div class="input-group">
                                        <label class="slider-label mb-0">Quantity</label>
                                        <input type="range" class="form-control p-0 ml-3 mr-4" id="rangeQty" name="range_qty" min="0" max="20" value="'.$row["quantity"].'" oninput="this.form.number_qty.value=this.value" required>
                                        <div class="input-group-append">
                                            <input type="number" class="form-control" id="numberQty" name="number_qty" min="0" max="20" value="'.$row["quantity"].'" oninput="this.form.range_qty.value=this.value" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <input type="hidden" name="target_isbn" value="'.$isbn.'">
                            <div class="text-right">
                                <button type="submit" class="btn btn-success" name="edit_book_submit"><i class="fa fa-floppy-o"></i>&nbsp; Submit</button>
                            </div>
                        </form>
                    </div>
                  ';
              }
              if(!empty($_GET["status"])){
                  if(strcmp($_GET["status"], "success") == 0){
                      echo'<script type="text/javascript">'.
                      '$("#alert_box").removeClass("hide").addClass("alert").addClass("alert-success").addClass("alert-dismissible").addClass("fade").addClass("show");'
                      .'$("#alert_msg").html("'
                              . '<strong>Update Successful!</strong> Book details of '.$isbn.' has been successfully updated.'
                              . '");'
                      .'$("#close_btn").removeAttr("hidden");'
                      . '</script>';
                  }
                  else if(strcmp($_GET["status"], "fail") == 0){
                      echo'<script>'.
                      '$("#alert_box").removeClass("hide").addClass("alert").addClass("alert-danger").addClass("alert-dismissible").addClass("fade").addClass("show");'
                      .'$("#alert_msg").html("'
                              . '<strong>Update Failed!</strong> Book details of '.$isbn.' is not updated.'
                              . '");'
                      .'$("#close_btn").removeAttr("hidden");'
                      . '</script>';
                  }
              }
              
            } else {
              echo "<h1>No Books Found!<h1>";
            }
            $conn->close();
        ?>
        
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