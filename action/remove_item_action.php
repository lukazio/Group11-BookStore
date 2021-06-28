<?php
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
    $cart = json_decode($_COOKIE['cart'], true);
    if(isset($cart[$id])){
        unset($cart[$id]);
        setcookie("cart", json_encode($cart), time()+60*60*24*365,'/');
        $_COOKIE['cart'] = json_encode($cart);
        return true;
    }
    else{
        return false;
    }
}


