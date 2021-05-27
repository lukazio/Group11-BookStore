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
background: #f29d16;
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
                <label for="username">Username</label>
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
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="submitted">Register Now</button>
                </div>
            </form>
        <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
        </div>
    </div>
    <?php include ('modules/footer.php')?>
</body>
</html>

