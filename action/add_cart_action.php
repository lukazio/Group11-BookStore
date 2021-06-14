<?php
session_start();
$id = $_GET['id'];
$stock = $_GET['stock'];
$price = $_GET['price'];

if(enoughStock($stock)){
    addItem($id, $price);
    // Return success
    header('Location:../cart.php?add=success');
}
else{
    // Return back with error msg
    header('Location:../cart.php?add=fail');
}

function enoughStock($stock){
    if(($stock - 1) < 0){
        return false;
    }
    else{
        return true;
    }
}

function addItem($id, $price) {
    $_SESSION['cart'][$id]['amt']++;

    $_SESSION['cart'][$id]['price'] = $price * $_SESSION['cart'][$id]['amt'];
}

?>

