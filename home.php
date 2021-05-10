<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="modules/homeStyle.css" rel="stylesheet" type="text/css"/>
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
            <p>WE ARE LOCATED AT PLACES NO ONE KNOWS<br>BUT WE DELIVER TO DOORSTEPS.</p>
        </div> 
        
        <!-- Heading -->
        <div class="container">
            <div class="row">
                <h1 class="col-11 font-weight-light" style="padding-bottom: 16px;">Books</h1>
                <div class="col-1 dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="selectedView" class="fa fa-th"></span>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a id="grid" class="dropdown-item" href="#">Grid View &nbsp;<span class="fa fa-th"></span></a>
                    <a id="list" class="dropdown-item" href="#">List View &nbsp;<span class="fa fa-list"></span></a>
                  </div>
                </div>
            </div> 
        </div>
        
        <!-- On View Selected -->
        <script>
            $('#grid').on('click', function(){
                // Tick Grid
                $(this).addClass('active').siblings().removeClass('active');
                // Change selected Icon
                var selectedIcon = $('#selectedView');
                selectedIcon.removeClass("fa fa-list").addClass("fa fa-th");
                // Change Holder to Row
                var classToChg = $('div[data-role="holder"]');
                classToChg.addClass('col-3').addClass('mb-5').removeClass('row').removeClass('listView');
                classToChg.parent().addClass('row');
                // Replace Book Card with Row
                var card = $('div[data-role="book"]');
                card.removeClass("row").addClass("card");
                // Change Image View
                var img = $('img[data-role="cardImgTop"]');
                img.removeClass("col-3").addClass("card-img-top");
                img.css('max-width','100%');
                img.css('max-height','100%');
                // Change Card Body to Row
                var cardBody = $('div[data-role="cardBody"]');
                cardBody.addClass("card-body").removeClass("col-9").removeClass("row");
                // Change Row to Columns
                var rows = $('div[data-role="detail"]');
                var cartButton = $('div[data-role="cartBtn"]');
                rows.addClass('row').removeClass('col-3').removeClass('align-self-center');
                cartButton.removeClass('col-3').removeClass('align-self-center');
            });
            $('#list').on('click', function(){
                // Tick List
                $(this).addClass('active').siblings().removeClass('active');
                // Change selected Icon
                var selectedIcon = $('#selectedView');
                selectedIcon.removeClass("fa fa-th").addClass("fa fa-list");
                // Change Holder to Row
                var classToChg = $('div[data-role="holder"]');
                classToChg.addClass('row').addClass('listView').removeClass('col-3').removeClass('mb-5');
                classToChg.parent().removeClass('row');
                // Replace Book Card with Row
                var card = $('div[data-role="book"]');
                card.removeClass("card").addClass("row");
                // Change Image View
                var img = $('img[data-role="cardImgTop"]');
                img.removeClass("card-img-top").addClass("col-3");
                img.css('max-width','');
                img.css('max-height','');
                // Change Card Body to Row
                var cardBody = $('div[data-role="cardBody"]');
                cardBody.removeClass("card-body").addClass("col-9").addClass("row");
                // Change Row to Columns
                var rows = $('div[data-role="detail"]');
                var cartButton = $('div[data-role="cartBtn"]');
                rows.removeClass('row').addClass('col-3').addClass('align-self-center');
                cartButton.addClass('col-3').addClass('align-self-center');
            });
        </script>
        
        <!-- Search Bar -->
        <div class="container">
          <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input id="search" type="text" class="form-control" placeholder="Search book title...">
          </div>
        </div>
        
        <!-- Search query -->
        <script>
        $(document).ready(function(){
          $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $('div[data-role="book"]').filter(function() {
                $(this).toggle($(this).find('h5').text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
        
        <!-- Body Content/Book Catalog -->
        <div class="container">
            <div class="row">
                <?php
                    $sql = "SELECT title, author, picture, retail_price FROM book";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo
                          "<div data-role=\"holder\" class=\"col-3 mb-5\">".
                              "<div class=\"card\" data-role=\"book\">".
                                "<img data-role=\"cardImgTop\" class=\"card-img-top\" src=\"".$row["picture"]."\" alt=\"".$row["title"]."\" style=\"max-width:100%;max-height:100%\">".
                                "<div data-role=\"cardBody\" class=\"card-body\">".    
                                    "<div data-role=\"detail\" class=\"row\"><h5 class=\"col-12 card-title\">".$row["title"]."</h5></div>".
                                    "<div data-role=\"detail\" class=\"row\"><p class=\"col-12 card-text\">".$row["author"]."</p></div>".
                                    "<div data-role=\"detail\" class=\"row\"><p class=\"col-12 card-text\">RM ".$row["retail_price"]."</p></div>".
                                    "<div data-role=\"cartBtn\"><button class=\"cart-btn\"><i class=\"fa fa-shopping-cart\"></i> Add to Cart</button></div>".
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