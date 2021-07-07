<?php
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
    $cart = json_decode($_COOKIE['cart'], true);
    
    $cart[$id]['amt']++;
    $cart[$id]['price'] = $price * $cart[$id]['amt'];
    
    setcookie("cart", json_encode($cart), time()+60*60*24*365,'/');
    $_COOKIE['cart'] = json_encode($cart);
}

?>

