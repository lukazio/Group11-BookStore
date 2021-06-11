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

    <body class="body-bg">

        <!-- Banner -->       
        <div class="jumbotron background-tint">
            <h1>Welcome to Mondstadt Book Store</h1>
            <p>WE ARE LOCATED AT PLACES NO ONE KNOWS<br>BUT WE DELIVER TO DOORSTEPS.</p>
        </div> 

        <!-- Heading -->
        <div class="container">
            <div class="row">
                <?php
                if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
                    echo '
                            <h1 class="col-md-9 font-weight-light" style="padding-bottom: 16px;">Books</h1>
                            <div class="col-md-2">
                                <a class="btn btn-primary" href="stock_levels.php" role="button" style="margin-right: 16px;">
                                    Stocks Level
                                </a>
                            </div>
                            <div class="col-md-1 dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="selectedView" class="fa fa-th"></span>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a id="grid" class="dropdown-item active" href="#">Grid View &nbsp;<span class="fa fa-th"></span></a>
                                <a id="list" class="dropdown-item" href="#">List View &nbsp;<span class="fa fa-list"></span></a>
                              </div>
                            </div>
                        ';
                } else {
                    echo '
                            <h1 class="col-11 font-weight-light" style="padding-bottom: 16px;">Books</h1>
                            <div class="col-1 dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="selectedView" class="fa fa-th"></span>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a id="grid" class="dropdown-item active" href="#">Grid View &nbsp;<span class="fa fa-th"></span></a>
                                <a id="list" class="dropdown-item" href="#">List View &nbsp;<span class="fa fa-list"></span></a>
                              </div>
                            </div>
                        ';
                }
                ?>
            </div> 
        </div>

        <!-- On View Selected -->
        <script>
            $('#grid').on('click', function () {
                // Tick Grid
                $(this).addClass('active').siblings().removeClass('active');
                // Change selected Icon
                var selectedIcon = $('#selectedView');
                selectedIcon.removeClass("fa fa-list").addClass("fa fa-th");
                // Change Holder to Row
                var classToChg = $('div[data-role="holder"]');
                classToChg.addClass('col-md-3').addClass('col-6').addClass('mb-5').removeClass('row').removeClass('listView');
                classToChg.parent().addClass('row');
                // Replace Book Card with Row
                var card = $('div[data-role="book"]');
                card.removeClass("row").addClass("card").addClass("h-100");
                // Change Image View
                var img = $('img[data-role="cardImgTop"]');
                img.removeClass("col-3").addClass("card-img-top");
                // Change Card Body to Row
                var cardBody = $('div[data-role="cardBody"]');
                cardBody.addClass("card-body").removeClass("col-9").removeClass("row");
                // Change Row to Columns
                var rows = $('div[data-role="detail"]');
                var cartButton = $('div[data-role="cartBtn"]');
                rows.addClass('row').removeClass('col-3').removeClass('align-self-center');
                cartButton.removeClass('col-3').removeClass('align-self-center');
            });
            $('#list').on('click', function () {
                // Tick List
                $(this).addClass('active').siblings().removeClass('active');
                // Change selected Icon
                var selectedIcon = $('#selectedView');
                selectedIcon.removeClass("fa fa-th").addClass("fa fa-list");
                // Change Holder to Row
                var classToChg = $('div[data-role="holder"]');
                classToChg.addClass('row').addClass('listView').removeClass('col-md-3').removeClass('mb-5').removeClass('col-6');
                classToChg.parent().removeClass('row');
                // Replace Book Card with Row
                var card = $('div[data-role="book"]');
                card.removeClass("card").removeClass("h-100").addClass("row");
                // Change Image View
                var img = $('img[data-role="cardImgTop"]');
                img.removeClass("card-img-top").addClass("col-3");
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
            $(document).ready(function () {
                $("#search").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $('div[data-role="book"]').filter(function () {
                        $(this).toggle($(this).find('h5').text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>

        <!-- Body Content/Book Catalog -->
        <div class="container">
            <div class="row">
                <?php
                $sql = "SELECT isbn, title, author, picture, retail_price, quantity FROM book";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo
                        "<div data-role=\"holder\" class=\"col-6 col-md-3 mb-5\">" .
                        "<div class=\"card h-100\" data-role=\"book\">" .
                        "<img data-role=\"cardImgTop\" class=\"card-img-top\" src=\"" . $row["picture"] . "\" alt=\"" . $row["title"] . "\">" .
                        "<div data-role=\"cardBody\" class=\"card-body\">" .
                        "<div data-role=\"detail\" class=\"row\"><h5 class=\"col-12\"><a class=\"card-title\" href=\"book_info.php?isbn=" . $row["isbn"] . "\">" . $row["title"] . "</a></h5></div>" .
                        "<div data-role=\"detail\" class=\"row\"><p class=\"col-12 card-text\">" . $row["author"] . "</p></div>" .
                        "<div data-role=\"detail\" class=\"row\"><p class=\"col-12 card-text\">RM " . $row["retail_price"] . "</p></div>";

                        if (isset($_SESSION['cart'])) {
                            $available = true;
                            foreach ($_SESSION['cart'] as $id => $props) {
                                if ($props['isbn'] == $row["isbn"]) {
                                    if ($props['amt'] >= $row["quantity"]) {
                                        $available = false;
                                        break;
                                    }
                                }
                            }
                            if ($available == true) {
                                echo "<div data-role=\"cartBtn\"><a class=\"btn cart-btn\" href=\"action/home_action.php?isbn=" . $row['isbn'] . "&title=" . $row['title'] . "&pic=" . $row['picture'] . "&price=" . $row['retail_price'] . "\" role=\"button\"><i class=\"fa fa-shopping-cart\"></i> Add To Cart</i></a></div>";
                            } else {
                                echo "<div data-role=\"cartBtn\"><a class=\"btn cart-btn disabled\" role=\"button\"><i class=\"fa fa-shopping-cart\"></i> No Stock</i></a></div>";
                            }
                        } else {
                            echo "<div data-role=\"cartBtn\"><a class=\"btn cart-btn\" href=\"action/home_action.php?isbn=" . $row['isbn'] . "&title=" . $row['title'] . "&pic=" . $row['picture'] . "&price=" . $row['retail_price'] . "\" role=\"button\"><i class=\"fa fa-shopping-cart\"></i> Add To Cart</i></a></div>";
                        }
                        echo
                        "</div>" .
                        "</div>" .
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