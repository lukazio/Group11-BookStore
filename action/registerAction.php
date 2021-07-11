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
        echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>No empty fields are allowed !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
        $errorcount++;
    }elseif(strlen(trim($email)) == 0){
         echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>No empty fields are allowed !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
        $errorcount++;
    }elseif(strlen(trim($password)) == 0){
         echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>No empty fields are allowed !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
        $errorcount++;
    }elseif(strlen($password) <'8'){
         echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Password at least 8 character!</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
        $errorcount++;
    }elseif(!preg_match("#[0-9]+#",$password)){
        echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Your Password Must Contain At Least 1 Number,1 Capital letter,1 Lowercase Letter, and 1 Special Character!!</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
        $errorcount++;
    }elseif(!preg_match("#[A-Z]+#",$password)){
        echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Your Password Must Contain At Least 1 Number,1 Capital letter,1 Lowercase Letter, and 1 Special Character!!</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
        $errorcount++;
    }elseif(!preg_match("#[a-z]+#",$password)){
        echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Your Password Must Contain At Least 1 Number,1 Capital letter,1 Lowercase Letter, and 1 Special Character!!</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
        $errorcount++;
    }elseif(!preg_match('/[\'^£$%&*()}{@#~?><>!,|=_+¬-]/',$password)){
        echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span>Your Password Must Contain At Least 1 Number,1 Capital letter,1 Lowercase Letter, and 1 Special Character!</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
        $errorcount++;
    }elseif($password!=$password2){
         echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span> Password did not match !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
        $errorcount++;
    }else{
        $user_check_query = "SELECT * FROM user WHERE username ='$username' OR email ='$email' LIMIT 1";
    $result = mysqli_query($conn,$user_check_query);
    $user=mysqli_fetch_assoc($result);

    if ($user){
        if($user['username']=== $username){
            echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span> User already exist !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
            $errorcount++;
        }else if($user['email']===$email){
            echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\"><span> User already exist !</span><button type=\"button\" class=\"close\" data-dismiss = \"alert\"><span aria-hidden = \"true\">&times</span></div>";
            $errorcount++;
        }
    }
    
    if ($errorcount==0){
            $password = md5($password);

            $query = "INSERT INTO user (email,username,password,is_admin) 
                              VALUES('$email','$username','$password',0)";
            mysqli_query($conn, $query);
            ?>
            <script type="text/javascript">
                Swal.fire({
                    icon: 'success',
                    title: 'Account Created!',
                    text: 'Your account has been successfully created, sign in now to start shopping!',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    confirmButtonColor: '#5bc0de',
                    cancelButtonText: 'Back',
                    reverseButtons: true
                }).then((result) => {
                    if(result.value)
                        window.location.href = "login.php";
                });
            </script>
            <?php
        }
    }
}
?>



