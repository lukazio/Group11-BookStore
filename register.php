<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
        <link rel="stylesheet" href="modules/register.css">
<?php require 'modules/link.php'; ?> 
<style>
:root {
font-size: 100%;
font-size: 16px;
line-height: 1.5;
}
body {
padding: 0;
margin: 0;
background-image: url("https://www.stmellitus.ac.uk/sites/default/files/Library%20banner_0.png");
}

</style>
<?php include ('modules/header.php') ?>
</head>

<body>
    <div class="bs-example">
        <?php include('action/registerAction.php') ?>
        <div class="signup-form">
            <form action="register.php" method="post">
                <h2>Sign Up</h2>
                <label for="username"><b>Username</b></label>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" >
                </div>
                <label for="email"><b>Email</b></label>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" >
                </div>
                <label for="password"><b>Password</b></label>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" >
                </div>
                <label for="password2"><b>Retype Password</b></label>
                <div class="form-group">
                    <input type="password" class="form-control" name="password2" id="password2" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="submitted">Create Account</button>
                </div>
            </form>
            <div class="text-center signin-link rounded p-3">Already have an account? <a href="login.php"><b>Sign In</b></a></div>
        </div>
    </div>
    <?php include ('modules/footer.php')?>
</body>
</html>

