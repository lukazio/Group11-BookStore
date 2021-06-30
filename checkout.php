<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="modules/checkout.css" rel="stylesheet" type="text/css"/>
        <title>Checkout</title>

        <?php
        require 'modules/link.php';
        ?>
    </head>

    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    ?>
    <body>
        <div class="container">
            <div class="row" style="padding-top: 15px; padding-bottom: 15px">
                <!--billing info-->
                <div class="col-md-8">
                    <h4>Billing Info</h4>

                </div>

                <!--payment summary-->
                <div class="col-md-4">
                    <?php
                    if (isset($_COOKIE['cart'])) { //if cart cookie is intialized
                        $tempCart = json_decode($_COOKIE['cart'], true);
                        //payment summray header
                        if (count($tempCart) < 1) {
                            $badge = "<span class='container badge badge-secondary badge-pill'>0</span>";
                        } else {
                            $badge = "<span class='badge badge-secondary badge-pill'>" . count($tempCart) . "</span>";
                        }
                        echo'<h4>Payment Summary ' . $badge . '</h4>';
                        //payment summray content
                        echo'<ul class="list-group">';
                        $subtotal = 0;
                        foreach ($tempCart as $id => $props) {
                            $subtotal += $props['price'];
                            echo
                            '<li class="list-group-item">' .
                            '<div class=" row">' .
                            '<div class="col-8">' .
                            '<h6>' . $props['title'] . '</h6>';
                            $sql = "SELECT retail_price FROM book WHERE isbn ='" . $props['isbn'] . "'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<small class ="text-muted"> RM' . $row["retail_price"] . ' x ' . $props['amt'] . ' unit(s)</small>';
                                }
                            }
                            echo
                            '</div>' .
                            '<div class="col-auto"><span class ="text-muted">RM' . $props['price'] . '</span></div>' .
                            '</div>' .
                            '</li>';
                        }
                        echo
                        '<li class="list-group-item list-group-item-secondary">' .
                        '<div class=" row">' .
                        '<div class="col-8">' .
                        '<h6>Sub Total:</h6>' .
                        '</div>' .
                        '<div class="col-auto"><span class ="text-muted">RM' . $subtotal . '</span></div>' .
                        '</div>' .
                        '</li>' .
                        '<li class="list-group-item">' .
                        '<div class=" row">' .
                        '<div class="col-8">' .
                        '<h6>Delivery Fee:</h6>' .
                        '</div>' .
                        '<div class="col-auto"><span class ="text-muted">RM' . $subtotal . '</span></div>' .
                        '</div>' .
                        '</li>' .
                        '<li class="list-group-item list-group-item-success">' .
                        '<div class=" row">' .
                        '<div class="col-8">' .
                        '<h5>Grand Total:</h5><br>' .
                        '</div>' .
                        '<div class="col-auto"><h5>RM' . $subtotal . '</h5></div>' .
                        '</div>' .
                        '</li>';

                        echo'</ul>';
                    } else { //if no cart cookie
                        $badge = "<span class='badge badge-secondary badge-pill'>0</span>";
                        echo'<h4>Payment Summary ' . $badge . '</h4>';
                        echo'<h4>no cookie </h4>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>


    <?php
    include 'modules/footer.php';
    ?>

</html>

