<?php
include ('modules/dbconnect.php');
if(!isset($_SESSION)){
    session_start();
}
    
$username="";
$email="";
$password="";
$password2="";
$errorcount=0;

if(isset($_POST['submitted'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    
    
    if (strlen(trim($username)) == 0){
       echo '<div class="alert alert-danger alert-dismissible fade in">
            Username is require
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
       $errorcount++;
    }elseif(strlen(trim($email)) == 0){
        echo '<div class="alert alert-danger alert-dismissible fade in">
            Email is require
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
        $errorcount++;
    }elseif(strlen(trim($password)) == 0){
        echo '<div class="alert alert-danger alert-dismissible fade in">
            Password is require
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
        $errorcount++;
    }elseif(strlen($password) <= '8'){
        echo '<div class="alert alert-danger alert-dismissible fade in">
            Your Password Must Contain At Least 8 Digits!
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
        $errorcount++;
    }elseif(!preg_match("#[0-9]+#",$password)){
        echo '<div class="alert alert-danger alert-dismissible fade in">
            Your Password Must Contain At Least 1 Number!
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
        $errorcount++;
    }elseif(!preg_match("#[A-Z]+#",$password)){
        echo '<div class="alert alert-danger alert-dismissible fade in">
            Your Password Must Contain At Least 1 Capital Letter!
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
        $errorcount++;
    }elseif(!preg_match("#[a-z]+#",$password)){
        echo '<div class="alert alert-danger alert-dismissible fade in">
            Your Password Must Contain At Least 1 Lowercase Letter!
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
        $errorcount++;
    }elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$password)){
        echo '<div class="alert alert-danger alert-dismissible fade in">
            Your Password Must Contain At Least 1 Special Character!
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
        $errorcount++;
    }elseif($password!=$password2){
        echo '<div class="alert alert-danger alert-dismissible fade in">
            Password did not match
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
        $errorcount++;
    }else{
        $user_check_query = "SELECT * FROM user WHERE username ='$username' OR email ='$email' LIMIT 1";
    $result = mysqli_query($conn,$user_check_query);
    $user=mysqli_fetch_assoc($result);

    if ($user){
        if($user['username']=== $username){
            echo '<div class="alert alert-danger alert-dismissible fade in">
            User already exist 
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
            $errorcount++;
        }

        if($user['email']===$email){
            echo '<div class="alert alert-danger alert-dismissible fade in">
            Email already exist
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
            $errorcount++;
        }
    }
    
    if ($errorcount==0){
            $password = md5($password);

            $query = "INSERT INTO user (email,username,password,is_admin) 
                              VALUES('$email','$username','$password',0)";
            mysqli_query($conn, $query);
            $_SESSION['username'] = $username;
            /*header('location: index.php');*/
        }
    }
}
?>



