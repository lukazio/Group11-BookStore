<!doctype html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="modules/login.css">
        <?php
            require 'modules/link.php';
        ?>
    </head>
    
    <?php
        session_start();
        require 'modules/dbconnect.php';
        include 'modules/header.php';
        
        if(isset($_SESSION['email']))
        header("Location: home.php");
    ?>
    
<body>
    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="form-container" action="action/login_action.php" method="post">
                    
                    <section class="login_section">
                        <h2>Log In</h2>
                        <div class="login-container">
                            <p>Don't have an account yet? <a href="register.php"><strong>Sign Up</strong></a></p>
                        </div>
                    </section>
                    
                    <div class="form-group">
                        <label for="text_username_email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email">
                    </div>
                    
                    <div class="form-group">
                        <label for='text_password'>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div>
                    
                    <div class="text-center">
                        <div class="text-center">
                            <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"] == "emptyinput"){
                                    echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>No empty fields are allowed !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                                }
                                
                                else if ($_GET["error"] == "wronglogin"){
                                    echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Invalid email or password !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                                }
                        
                                else if ($_GET["error"] == "stmtfailed"){
                                    echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Something went wrong, try again !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
                                }
                            }
                            ?>
                    </div>
                    <button class="btn_login" type="submit" name="submit"> Log In </button>
                </form>
            </section>
        </section>
    </section>
    
</body>
 <?php
        include 'modules/footer.php';
    ?>
</html>


