<?php

$addCart = array("isbn" => $_GET['isbn'], "amt" => $_GET['quantity'], "title" => $_GET['title'], "pic" => $_GET['pic'], "price" => $_GET['price']*$_GET['quantity']);
$tempISBN = $_GET['isbn'];
$tempPrice = $_GET['price'];
$tempAmt = $_GET['quantity'];
$tempCart = array();

//initialize 'cart' array cookie
if (!isset($_COOKIE['cart'])) {
    $_COOKIE['cart'] = array();
}

//if cookie is empty, pass first element into tempCart
if (empty($_COOKIE['cart'])) {
    array_push($tempCart, $addCart);
}
//if cookie is not empty, get prev cookie data first, only pass new element into tempCart
else {
    $same_counter = 0;
    $tempCart = json_decode($_COOKIE['cart'], true);
    foreach ($tempCart as $id => $props) {
        if ($props['isbn'] == $tempISBN) {
            $tempCart[$id]['amt'] += $tempAmt;
            $tempCart[$id]['price'] = $tempPrice * $tempCart[$id]['amt'];
            echo "DUPLICATED" . $tempCart[$id]['title'] . " " . $tempCart[$id]['amt'] . " " . $tempCart[$id]['price'] . "<br>";
            $same_counter++;
        }
    }

//if dont have same only create new element
    if ($same_counter == 0) {
        array_push($tempCart, $addCart);
    }
}

setcookie("cart", json_encode($tempCart), time()+60*60*24*365,'/');
$_COOKIE['cart'] = json_encode($tempCart);

var_dump($_COOKIE['cart']);

header("Location: ../home.php"); //uncomment this to see output for debugging
?>
