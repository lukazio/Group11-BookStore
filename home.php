<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="homeStyle.css">
        <title>Mondstadt Home</title>
        
        <?php
        require 'modules/link.php';
        ?>
    </head>
    
    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    ?>
    
    <body>
        
        <!-- Banner (Remove Container for FULL WIDTH)-->
        
           <div class="jumbotron background-tint">
              <h1>Welcome to Mondstadt Book Store</h1>
              <p>This is 696969696969696969699696969699696966969969696969699696 HAhahahha Okay.</p>
            </div> 
        
        
        <!-- Search Bar -->
        <div class="container">
          <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" class="form-control" placeholder="Search">
          </div>
        </div>
        
        <!-- Body Content/Book Catalog -->
        <div class="container">
            <div class="row">
                <?php
                    $sql = "SELECT title, author, picture, retail_price FROM book";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo
                          "<div class=\"col-3 mb-5\">".
                              "<div class=\"card\">".
                                "<img class=\"card-img-top\" src=\"".$row["picture"]."\" alt=\"".$row["title"]."\" style=\"max-width:100%;max-height:100%\">".
                                "<div class=\"card-body\">".    
                                    "<h4 class=\"card-title\">".$row["title"]."</h4>".
                                    "<p class=\"card-text\">by ".$row["author"]."</p>".
                                    "<p class=\"card-text\">RM ".$row["retail_price"]."</p>".
                                    "<button class=\"cart-btn\"><i class=\"fa fa-shopping-cart\"></i> Add to Cart</button>".
                                "</div>".
                              "</div>".
                          "</div>";
                      }
                    } else {
                      echo "<h1>0 result<h1>";
                    }
                    $conn->close();
                ?>
            </div>       
        </div>
        
    </body>
    
    <?php
    include 'modules/footer.php';
    ?>
    
</html>