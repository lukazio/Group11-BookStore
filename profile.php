<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Profile</title>

        <?php
        require 'modules/link.php';
        ?>
        
        <link rel="stylesheet" type="text/css" href="modules/profile.css">
    </head>

    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';

    if (!isset($_SESSION['email']))
        header("Location: login.php");
    ?>

    <body>
        <?php
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM user WHERE email = '$email';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $email = $row['email'];
                $username = $row['username'];
            }
        }
        ?>
        <div class="container">
            <div class="row my-5">
                <div class="my-3">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>No empty fields are allowed !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                        } elseif ($_GET["error"] == "confirm_pw") {
                            echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Confirmation password doesn't match !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                        } elseif ($_GET["error"] == "incorrect_password") {
                            echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Incorrect password !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                        } elseif ($_GET["error"] == "passwordvalidate") {
                            echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Your Password Must Contain At Least 8 Digits !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                        } elseif ($_GET["error"] == "format_password") {
                            echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Your Password Must Contain At Least 1 Number,1 Capital letter,1 Lowercase Letter, and 1 Special Character !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                        } elseif ($_GET["error"] == "password_check") {
                            echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Your old password cannot be same with new password !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                        } elseif ($_GET["error"] == "addressEmptyInput"){
                             echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>No empty fields are allowed !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                        } elseif ($_GET["error"] == "databaseProblem"){
                              echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Database connection may have problem, please try later</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                        }
                    }

                    if(isset($_GET["success"])){
                        echo "<div class=\"alert alert-success alert-dismissable\" role=\"alert\"><span>Password has been changed successfully !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                    }
                    ?>
                </div>
                <div class="card-body pt-0">
                    <h1 class="font-weight-light mb-5">Your Profile</h1>
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <img src="img/profile_icon.png" alt="" id="imgProfile" class="img-fluid"/>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><?php echo $username ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="changePassword-tab" data-toggle="tab" href="#changePassword" role="tab" aria-controls="changePassword" aria-selected="false">Change Password</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="changeAddress-tab" data-toggle="tab" href="#changeAddress" role="tab" aria-controls="changeAddress" aria-selected="false">Change Address</a>
                                </li>
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <! --basic info part-- >
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Username</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?php echo $username ?>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Email</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?php echo $email ?>
                                        </div>
                                    </div>

                                </div>

                                <! --Change password part-- >
                                <div class="tab-pane fade" id="changePassword" role="tabpanel" aria-labelledby="changePassword-tab">
                                    <div class="row">
                                        <div class="col">
                                            <form action="action/change_pw.php" method="post">

                                                <div class="form-group row">
                                                    <label for="oldInputPassword" class="col-sm-2 col-form-label" style="font-weight:bold;">Old Password</label>
                                                    <div class="col-sm-4">
                                                        <input type="password" class="form-control" name="old_password" id="oldInputPassword" placeholder="Enter Old password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="newInputPassword" class="col-sm-2 col-form-label" style="font-weight:bold;">New Password</label>
                                                    <div class="col-sm-4">
                                                        <input type="password" class="form-control" name="new_password" id="newInputPassword" placeholder="Enter New password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="retypeInputPassword" class="col-sm-2 col-form-label" style="font-weight:bold;">Retype Password</label>
                                                    <div class="col-sm-4">
                                                        <input type="password" class="form-control" name="new_retype_password" id="retypeInputPassword" placeholder="Retype password">
                                                    </div>
                                                </div>

                                                <input type="hidden" name="changepw_submit">
                                                <button type="button" class="btn btn-primary btn-submit">Submit</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <! --Change address part-- >
                                <?php
                                // Obtain user address info
                                $addressSql = "SELECT address_line, city, state, zip_code, country FROM user WHERE email='$email' LIMIT 1;";
                                $row = mysqli_fetch_assoc(mysqli_query($conn, $addressSql));
                                ?>
                                 <div class="tab-pane fade" id="changeAddress" role="tabpanel" aria-labelledby="changeAddress-tab">
                                    <div class="row">
                                        <div class="col">
                                            <form action="action/change_address_action.php" method="post">

                                                <div class="form-group row">
                                                    <label for="newAddress" class="col-sm-2 col-form-label" style="font-weight:bold;">Address</label>
                                                    <div class="col-md-6 col-lg-4">
                                                        <input type="text" class="form-control" name="newAddress" id="newAddress" value="<?php echo $row['address_line']; ?>" placeholder="Enter Address">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="newCity" class="col-sm-2 col-form-label" style="font-weight:bold;">City</label>
                                                    <div class="col-md-6 col-lg-4">
                                                        <input type="text" class="form-control" name="newCity" id="newCity" value="<?php echo $row['city']; ?>" placeholder="Enter City">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="newState" class="col-sm-2 col-form-label" style="font-weight:bold;">State</label>
                                                    <div class="col-md-6 col-lg-4">
                                                        <input type="text" class="form-control" name="newState" id="newState" value="<?php echo $row['state']; ?>" placeholder="Enter State">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="newZipCode" class="col-sm-2 col-form-label" style="font-weight:bold;">Zipcode</label>
                                                    <div class="col-md-6 col-lg-4">
                                                        <input type="text" class="form-control" name="newZipCode" id="newZipCode" value="<?php echo $row['zip_code']; ?>" placeholder="Enter Zip Code">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="newCountry" class="col-sm-2 col-form-label" style="font-weight:bold;">Country</label>
                                                    <div class="col-md-6 col-lg-4">
                                                        <?php
                                                        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                                                        echo
                                                        '<select class="form-control" name="newCountry" id="newCountry" required>';
                                                        if ($row["country"] == null) {
                                                            echo'<option value = "">Select country</option>';
                                                        }
                                                        foreach ($countries as $value) {

                                                            if ($row["country"] != null && $row["country"] == $value) {
                                                                echo'<option value = "' . $value . '" selected>' . $value . '</option>';
                                                                continue; //prevent repeat selected country 
                                                            }
                                                            echo'<option value = "' . $value . '">' . $value . '</option>';
                                                        }
                                                        echo
                                                        '</select>';
                                                        ?>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary" name="submitted">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.btn-submit').on('click', function(e){
                    var $form = $(this).parents('form');

                    Swal.fire({
                        icon: 'warning',
                        type: 'warning',
                        html: '<p>Are you sure you want to change your password?</p>',
                        showCancelButton: true,
                        confirmButtonText: 'Change',
                        confirmButtonColor: '#f29d16',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true
                    }).then((result) => {
                        if(result.value){
                            Swal.fire({
                                icon: 'success',
                                type: 'success',
                                title: 'Changing password...',
                                showConfirmButton: false
                            });
                            $form.submit();
                        }
                    });
                });
            });
            
        </script>
    </body>

    <?php
    include 'modules/footer.php';
    ?>

</html>