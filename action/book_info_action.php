<?php

session_start();
$addCart = array("isbn" => $_GET['isbn'], "amt" => $_GET['quantity'], "title" => $_GET['title'], "pic" => $_GET['pic'], "price" => $_GET['price']*$_GET['quantity']);
$tempISBN = $_GET['isbn'];
$tempPrice = $_GET['price'];
$tempAmt = $_GET['quantity'];

//initialize 'cart' session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

//for first entry
if (count($_SESSION['cart']) == 0) {
    addNewItem($addCart);
}
// non first entry
else {
    $same_counter = 0;
    foreach ($_SESSION['cart'] as $id => $props) {
        //if equal isbn, increment 'amt', no create new element
        if ($props['isbn'] == $tempISBN) {
            updateDuplicateItem($id, $tempPrice, $tempAmt);
            $same_counter++;
        }
    }

//if dont have same only create new element
    if ($same_counter == 0) {
        addNewItem($addCart);
    }
}

var_dump($_SESSION['cart']);

header("Location: ../home.php");

//$_SESSION['cart'] = array(); //for debugging reset

function addNewItem($addCart) {
    array_push($_SESSION['cart'], $addCart);
}

function updateDuplicateItem($id, $tempPrice, $tempAmt) {
    $_SESSION['cart'][$id]['amt']+=$tempAmt;

    $_SESSION['cart'][$id]['price'] = $tempPrice * $_SESSION['cart'][$id]['amt'];
}

?>
