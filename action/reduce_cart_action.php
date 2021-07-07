<?php
$id = $_GET['id'];
$price = $_GET['price'];
$qty = $_GET['qty'];

if($qty == 1){
    header('Location:remove_item_action.php?id='.$id);
}
else{
    if(enoughQty($qty)){
        reduceItem($id, $price);
        // Return success
        header('Location:../cart.php?reduce=success');
    }
    else{
        // Return back with error msg
        header('Location:../cart.php?reduce=fail');
    }
}

function enoughQty($qty){
    if(($qty - 1) < 0){
        return false;
    }
    else{
        return true;
    }
}

function reduceItem($id, $price) {
    $cart = json_decode($_COOKIE['cart'], true);
    
    $cart[$id]['amt']--;
    $cart[$id]['price'] = $price * $cart[$id]['amt'];
    
    setcookie("cart", json_encode($cart), time()+60*60*24*365,'/');
    $_COOKIE['cart'] = json_encode($cart);
}

?>

