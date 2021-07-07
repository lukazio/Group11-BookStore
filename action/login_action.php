<?php
if(isset($_POST['submit'])){
    session_start();
    require '../modules/dbconnect.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    if(empty($email) || empty($password)){
        header("Location: ../login.php?error=emptyinput");
        exit();
    }
    
    loginUser($conn, $email, $password);
}
else{
    header("Location: ../login.php");
    exit();
}

//Check whether log in or not
function loginUser($conn, $email, $password){
    $uidExists = uidExists($conn, $email);
    
    if($uidExists === false){
        header("Location: ../login.php?error=wronglogin");
        exit();
    }
    
    $pwdHashed = $uidExists["password"];
    
    if(md5($password) == $pwdHashed){
        session_start();
        $_SESSION["user_id"] = $uidExists["user_id"];
         $_SESSION["username"] = $uidExists["username"];
        $_SESSION["email"] = $uidExists["email"];
        
        // Check if from Cart Checkout, if yes, straight direct to Cart
        if(isset($_GET['fromcart'])){
            header("Location: ../checkout.php");
        }
        else{
            header("Location: ../home.php");
        }
        
        exit();
    }
    else{
        header("Location: ../login.php?error=wronglogin");
        exit();
    }
}

//Check if user or email exist
function uidExists($conn, $email){
    $sql = "SELECT * FROM user WHERE email = '$email';";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../login.php?error=stmtfailed");
      exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)){
       return $row;
    }
    else{
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
}
?>
