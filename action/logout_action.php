<?php
session_start();
session_destroy();

if(isset($_COOKIE['cart'])) {
    unset($_COOKIE['cart']); 
    setcookie('cart', null, -1, '/');
}

header("Location: ../home.php");
?>
