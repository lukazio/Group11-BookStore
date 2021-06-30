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
                    <?php
                    if (isset($_SESSION['username'])) {
                        $sql = "SELECT username,email,address_line,city,state,zip_code,country FROM user WHERE username ='" . $_SESSION['username'] . "'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo
                                '<form>
                                <div class = "form-row"> <div class = "form-group col-sm-6">
                                <label for = "input-username" class = "lead">Username</label>
                                <input type = "text" class = "form-control" id = "input-username" placeholder = "Username" value="' . $row["username"] . '">
                                </div>
                                <div class = "form-group col-sm-6">
                                <label for = "input-email" class = "lead">Email</label>
                                <input type = "email" class = "form-control" id = "input-email" placeholder = "Email" value="' . $row["email"] . '">
                                </div>
                                </div>
                                <div class = "form-group col-mb-3">
                                <label for = "input-address" class = "lead">Address Line</label>
                                <textarea class = "form-control" id = "input-address" rows = "5" placeholder = "Address">'. $row["address_line"] .'</textarea>
                                </div>
                                <div class = "form-group col-mb-3">
                                <label for = "input-city" class = "lead">City</label>
                                <input type = "text" class = "form-control" id = "input-city" placeholder = "City"  value="' . $row["city"] . '">
                                </div>';
                                $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

                                echo
                                '<div class = "form-row">
                                <div class = "form-group col-md-4 mb-3">
                                <label for = "input-country" class = "lead">Country</label>
                                <select class="form-control" id="input-country">';

                                foreach ($countries as $value) {
                                    if($row["country"]!=null && $row["country"]==$value ){
                                        echo'<option value = "'.$value.'" selected>'.$value.'</option>';
                                    }
                                    echo'<option value = "'.$value.'">'.$value.'</option>';
                                }

                                echo '</select>
                                </div>';

                                echo
                                '<div class = "form-group col-md-4 mb-3">
                                <label for = "input-state" class = "lead">State</label>
                                <input type = "text" class = "form-control" id = "input-state" placeholder = "State"  value="' . $row["state"] . '">
                                </div>
                                <div class = "form-group col-md-4 mb-3">
                                <label for = "input-zip" class = "lead">Zip Code</label>
                                <input type = "text" class = "form-control" id = "input-zip" placeholder = "Zip Code"  value="' . $row["zip_code"] . '">
                                </div>
                                </div>
                                <a class = "btn btn-outline-success btn-lg btn-block" href = "" role = "button">Confirm Order</a>
                                </form>';
                            }
                        }
                    } else {
                        echo'<h4>no user detail found </h4>';
                    }
                    ?>
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
                            '<div class="col-md-8">' .
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
                            '<div class="col-md-auto"><span class ="text-muted">RM' . $props['price'] . '</span></div>' .
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
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </body>


    <?php
    include 'modules/footer.php';
    ?>

</html>

