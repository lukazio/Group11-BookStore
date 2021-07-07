<?php
session_start();
session_destroy();
setcookie("cart", "", time()-3600);
header("Location: ../home.php");
?>
