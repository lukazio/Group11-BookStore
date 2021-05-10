<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
        <link rel="stylesheet" href="modules/register.css">
        <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="Assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
font-family: 'Montserrat', sans-serif;
font-weight: bold;
background: #f29d16;
}

</style>
<?php include ('modules/header.php') ?>
</head>

<body>
    <div class="bs-example">
        <?php include('C:/xampp/htdocs/Group11-BookStore/action/registerAction.php') ?>
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
        <div class="text-center">Already have an account? <a href="">Sign in</a></div>
        </div>
    </div>
    <?php include ('modules/footer.php')?>
</body>
</html>

