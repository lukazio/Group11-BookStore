<?php
session_start();
$id = $_GET['id'];
if(removeItem($id)){
    // Return success
    header('Location:../cart.php?remove=success');
}
else{
    // Return back with error msg
    header('Location:../cart.php?remove=fail');
}


function removeItem($id){
    if(isset($_SESSION['cart'][$id])){
        unset($_SESSION['cart'][$id]);
        return true;
    }
    else{
        return false;
    }
}


