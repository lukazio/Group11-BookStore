<?php

session_start();

if(isset($_POST['changepw_submit'])){
    if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {

        include '../modules/dbconnect.php';

        if (isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['new_retype_password'])) {

            $old_pw = $_POST['old_password'];
            $new_pw = $_POST['new_password'];
            $new_retype_pw = $_POST['new_retype_password'];

            if (strlen(trim($old_pw)) == 0 || strlen(trim($new_pw)) == 0) {
                header("Location: ../profile.php?error=emptyinput");
                exit();
            } elseif (strlen($new_pw) < '8') {
                header("Location: ../profile.php?error=passwordvalidate");
                exit();
            } elseif ($new_pw !== $new_retype_pw) {
                header("Location: ../profile.php?error=confirm_pw");
                exit();
            } elseif (!preg_match("#[0-9]+#", $new_pw)) {
                header("Location: ../profile.php?error=format_password");
                exit();
            } elseif (!preg_match("#[A-Z]+#", $new_pw)) {
                header("Location: ../profile.php?error=format_password");
                exit();
            } elseif (!preg_match("#[a-z]+#", $new_pw)) {
                header("Location: ../profile.php?error=format_password");
                exit();
            } elseif (!preg_match('/[\'^£$%&*()}{@#~?!><>,|=_+¬-]/', $new_pw)) {
                header("Location: ../profile.php?error=format_password");
                exit();
            } elseif ($new_pw == $old_pw) {
                header("Location: ../profile.php?error=password_check");
                exit();
            } else{
                 $old_pw = md5($old_pw);
                 $new_pw = md5($new_pw);
                 $id = $_SESSION['user_id'];

                 $sql = "SELECT password FROM user WHERE user_id='$id' AND password='$old_pw'";
                 $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) === 1) {

                    $new_sql = "UPDATE user SET password='$new_pw' WHERE user_id='$id'";
                    mysqli_query($conn, $new_sql);
                    header("Location: ../profile.php?success=changesuccessfully");
                    exit();
                 } else {
                    header("Location: ../profile.php?error=incorrect_password");
                    exit();
                 }
            }

        } else {
            header("Location: ../profile.php");
            exit();
        }
    }
}
?>

