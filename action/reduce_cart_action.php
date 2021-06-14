<?php
session_start();
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
    $_SESSION['cart'][$id]['amt']--;

    $_SESSION['cart'][$id]['price'] = $price * $_SESSION['cart'][$id]['amt'];
}

?>

