<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Profile</title>

        <?php
        require 'modules/link.php';
        ?>
        <style>
            body{
                background-color: #f4f5f7; 
            }
        </style>
        <link rel="stylesheet" type="text/css" href="modules/(link your CSS if needed)">
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
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="img/profile_icon.png" alt="" id="imgProfile" style="width: 150px; height: 150px " class = "img-thumbnail"/>
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
                                                <form action="" method="post">

                                                    <div class="form-group row">
                                                        <label for="oldInputPassword" class="col-sm-2 col-form-label" style="font-weight:bold;">Old Password</label>
                                                        <div class="col-sm-4">
                                                            <input type="password" class="form-control" id="oldInputPassword" placeholder="Enter Old password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="newInputPassword" class="col-sm-2 col-form-label" style="font-weight:bold;">New Password</label>
                                                        <div class="col-sm-4">
                                                            <input type="password" class="form-control" id="newInputPassword" placeholder="Enter New password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="retypeInputPassword" class="col-sm-2 col-form-label" style="font-weight:bold;">Retype Password</label>
                                                        <div class="col-sm-4">
                                                            <input type="password" class="form-control" id="retypeInputPassword" placeholder="Retype password">
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
        </div>
    </body>

    <?php
    include 'modules/footer.php';
    ?>

</html>