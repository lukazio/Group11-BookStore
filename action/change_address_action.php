<?php

session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    require '../modules/dbconnect.php';
    if (isset($_POST['newAddress']) && isset($_POST['newCity']) && isset($_POST['newState']) && isset($_POST['newZipCode']) && isset($_POST['newCountry']) && isset($_POST['submitted'])) {
        $new_address = $_POST['newAddress'];
        $new_city = $_POST['newCity'];
        $new_state = $_POST['newState'];
        $new_zip_code = $_POST['newZipCode'];
        $new_country = $_POST['newCountry'];
        $user_id = $_SESSION['user_id'];

        if (empty($new_address) || empty($new_city) || empty($new_state) || empty($new_zip_code) || empty($new_country)) {
            header("Location: ../profile.php?error=addressEmptyInput");
            exit();
        } else {
            $sql = 'UPDATE user SET address_line = "' . $new_address . '", city = "' . $new_city . '", state = "' . $new_state . '", zip_code = "' . $new_zip_code . '", country = "' . $new_country . '" WHERE user_id="' . $user_id . '"';
        }

        if ($conn->query($sql) === TRUE) {
           header("Location: ../profile.php"); 
        } else {
            header("Location: ../profile.php?error=databaseProblem");
            exit();
        }
    }
}
?>
