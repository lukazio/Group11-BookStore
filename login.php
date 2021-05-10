<!doctype html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="modules/login.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <?php
        include 'modules/header.php';
    ?>
<body>
    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="form-container">
                    
                    <section class="login_section">
                        <h2>Log In</h2>
                        <div class="login-container">
                            <p>Don't have an account yet? <a href="register.php"><strong>Sign Up</strong></a></p>
                        </div>
                    </section>
                    
                    <div class="form-group">
                        <label for="text_email">Email </label>
                        <input type="email" class="form-control" id="input_email" placeholder="Enter Email">
                    </div>
                    
                    <div class="form-group">
                        <label for='text_password'>Password</label>
                        <input type="password" class="form-control" id="input_password" placeholder="Enter Password">
                    </div>
                    
                    <button class="btn_login" type="submit"> Log In </button>
                </form>
            </section>
        </section>
    </section>
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
 <?php
        include 'modules/footer.php';
    ?>
</html>


