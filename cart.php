<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="modules/cartStyle.css" rel="stylesheet" type="text/css"/>
        <title>Your Cart</title>
        
        <?php
        require 'modules/link.php';
        ?>
    </head>
    
    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    ?>

    <?php
        /**
         * MAIN
         */
        if(isset($_SESSION['cart'])){
            if (count($_SESSION['cart']) < 1) {
                echo '<center><h1 class="cart-msg">Your cart is empty...<br>Add some books to view it here</h1><center>';
            }
            else{
                $total=0;
                $query = "SELECT * FROM book WHERE ";
                $query = appendQuery($query);
                $result = $conn->query($query);                
                // Title and Headings
                echo '<div id="alert_box" class="hide" role="alert">
                            <h6 id="alert_msg"></h6>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span id="close_btn" hidden="true" aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                echo '<div class="container"><h3 class="cart-heading">Your Cart</h3>';
                
                // Display Each Book
                foreach ($_SESSION['cart'] as $id => $props) {
                    
                    foreach ($result as $sqlBook){
                        if($sqlBook["isbn"] == $props["isbn"]){
                            $total+=$props["price"];
                            displayBook($sqlBook, $props["amt"], $props["price"],$id);
                            break;  // prevent unecessary executions
                        }
                        continue; // prevent unecessary executions
                    }                    
                }
                
                // TOTAL and CHECK OUT
                echo
                 "<h3 class=\"cart-heading\">Total: <b>RM " . $total . "</b></h3>".
                "<div class=\"row justify-content-md-center\"><a class=\"btn btn-info checkout-btn\" href=\"checkout.php\" class=\"button\">Check Out</a></div></div>";
            }
            // PRINT JSCRIPT for Response Handling
            printScript();
        }
        else{
            echo '<center><h1 class="cart-msg">Error Retrieving Cart from Session!</h1></center>';
        }
        
        /**
         * Function to append SQL query in looping
         * and execute only one query instead of
         * looping the execution of multiple queries.
         */
        function appendQuery($queryToAppend){
            $counter = 0;
            foreach ($_SESSION['cart'] as $id => $properties) {
                // First Append
                if($counter == 0){
                    $queryToAppend .= 'isbn='.$properties['isbn'].' ';
                }
                // Subsequent Append
                else{
                    $queryToAppend .= 'OR isbn='.$properties['isbn'].' ';
                }
                $counter++;
            }
            return $queryToAppend;
        }
        
        /**
         * Function to display per book in cart in HTML
         */
        function displayBook($book, $bookQty, $bookTotalPrice, $id){
            $available = $book["quantity"] - $bookQty;
            echo'
                <div class="card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-2 align-self-center">
                    <a href="book_info.php?isbn='.$book["isbn"].'"><img src="'.$book['picture'].'" class="card-img" alt="loading..." onerror="this.src=\'img/placeholder.png\';"></a>
                  </div>
                  <div class="col-md-6">
                    <div class="card-body">
                      <h5><a class="card-title" href="book_info.php?isbn='.$book["isbn"].'">'.$book['title'].'</a></h5>
                      <p class="card-text"><small class="text-muted">by: '.$book['author'].'</small></p>
                      <h5 class="card-text editable-text">SUBTOTAL: RM '.$bookTotalPrice.'</h5>
                      <p class="card-text"><small class="text-muted">Unit Price: RM '.$book['retail_price'].' x '.$bookQty.'</small></p>
                    </div>
                  </div>
                  <div class="col-md-2 align-self-center">
                    <div class="card-body">
                      <h5 class="card-text center-text-align">Quantity:</h5>
                      <div class="row justify-content-md-center">
                        <a id="minus'.$id.'" class="btn btn-danger minus-sign" href="action/reduce_cart_action.php?id='.$id.'&qty='.$bookQty.'&price='.$book["retail_price"].'">-</a>
                        <h5 id="qty-label'.$id.'" class="card-text align-self-center editable-text center-text-align">'.$bookQty.'</h5>
                        <a id="plus'.$id.'" class="btn btn-success plus-sign" href="action/add_cart_action.php?id='.$id.'&stock='.$available.'&price='.$book["retail_price"].'">+</a>
                      </div>
                      <p class="card-text center-text-align"><small id="available'.$id.'" class="text-muted">Available: '.$available.'</small></p>
                      <script type="text/javascript">
                            var availableTxt = $("#available'.$id.'");
                            var addBtn = $("#plus'.$id.'");
                            var minusBtn = $("#minus'.$id.'");
                            var qtyLabel = $("#qty-label'.$id.'");
                            if(availableTxt.text() === "Available: 0"){
                                availableTxt.addClass("unavailable").removeClass("text-muted");
                                addBtn.addClass("disabled");
                            }
                            if(qtyLabel.text() === "1"){
                                minusBtn.addClass("disabled");
                            }
                        </script>
                    </div>
                  </div>
                  <div class="col-md-2 align-self-center">
                    <div class="card-body">
                      <a id="remove"'.$id.' onclick="remove'.$id.'OnClick()" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                    <script>
                        function remove'.$id.'OnClick(){
                            var link = "action/remove_item_action.php?id='.$id.'";
                            Swal.fire({
                                icon: "warning",
                                type: "warning",
                                title: "Remove '.$book["title"].' from cart?",
                                text: "Once this book is removed from cart, you can add it again.",
                                showCancelButton: true,
                                confirmButtonText: "Remove",
                                confirmButtonColor: "#d9534f",
                                cancelButtonText: "Cancel",
                                reverseButtons: true
                            }).then((result) => {
                                if(result.value){
                                    Swal.fire({
                                        icon: "success",
                                        type: "success",
                                        title: "Removing from cart...",
                                        showConfirmButton: false
                                    });
                                    window.location=link;
                                }
                            });
                        }
                    </script>
                  </div>
                </div>
              </div>
              ';
        }
        
        /**
         * Function to PRINT JSCRIPT for Response Handling
         */
        function printScript(){
            // IF printing Script is needed
            if(!empty($_GET["add"]) || !empty($_GET["reduce"]) || !empty($_GET["remove"])){
                // Get response
                $response = array("status"=>"none", "msg"=>"none");
                if(!empty($_GET["add"])){
                      if(strcmp($_GET["add"], "success") == 0){
                          $response = funcResponse("add", "success");
                      }
                      else if(strcmp($_GET["add"], "fail") == 0){
                          $response = funcResponse("add", "fail");
                      }
                }
                else if(!empty($_GET["reduce"])){
                      if(strcmp($_GET["reduce"], "success") == 0){
                          $response = funcResponse("reduce", "success");
                      }
                      else if(strcmp($_GET["reduce"], "fail") == 0){
                          $response = funcResponse("reduce", "fail");
                      }
                }
                else if(!empty($_GET["remove"])){
                      if(strcmp($_GET["remove"], "success") == 0){
                          $response = funcResponse("remove", "success");
                      }
                      else if(strcmp($_GET["remove"], "fail") == 0){
                          $response = funcResponse("remove", "fail");
                      }
                }
                
                // Start Print Script
                if($response["status"] == "success"){
                   echo'<script type="text/javascript">
                    $("#alert_box").removeClass("hide").addClass("alert").addClass("alert-success").addClass("alert-dismissible").addClass("fade").addClass("show");
                    $("#alert_msg").html("<strong>'.$response["msg"].'</strong>");
                    $("#close_btn").removeAttr("hidden");
                </script>'; 
                }
                else{
                    echo'<script type="text/javascript">
                    $("#alert_box").removeClass("hide").addClass("alert").addClass("alert-danger").addClass("alert-dismissible").addClass("fade").addClass("show");
                    $("#alert_msg").html("<strong>'.$response["msg"].'</strong>");
                    $("#close_btn").removeAttr("hidden");
                </script>'; 
                }
            }
        }
        
        /**
         * Function to get parameter function and return response necessarily
         */
        function funcResponse($func, $status){
            if($func == "add" && $status == "success"){
                return array("status"=>$status, "msg"=>"Quantity Added Successfully!");
            }
            else if($func == "add" && $status == "fail"){
                return array("status"=>$status, "msg"=>"Quantity Add Failed...");
            }
            else if($func == "reduce" && $status == "success"){
                return array("status"=>$status, "msg"=>"Quantity Reduced Successfully!");
            }
            else if($func == "reduce" && $status == "fail"){
                return array("status"=>$status, "msg"=>"Quantity Reduce Failed...");
            }
            else if($func == "remove" && $status == "success"){
                return array("status"=>$status, "msg"=>"Item Removed Successfully!");
            }
            else if($func == "remove" && $status == "fail"){
                return array("status"=>$status, "msg"=>"Item Remove Failed...");
            }
            else{
                return array("status"=>$status, "msg"=>"ERROR!");
            }
        }
    ?>
    
    <?php
    include 'modules/footer.php';
    ?>
    
</html>