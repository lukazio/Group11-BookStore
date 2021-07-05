<?php

class cartIntegrationTest {

    public function validateInitSessionIsEmptyIntegrate() {

        $_SESSION['cart'] = array();

        return $_SESSION['cart'];
    }

    public function addingNewItemIntegrate($addCart) {
        //$dummyArray = array();

        if ($addCart != null) {
            array_push($_SESSION['cart'], $addCart);
        }

        return $_SESSION['cart'];
    }

    public function checkDuplicatedSessionBookIntegrate($tempISBN) {

        $addCart3 = array("isbn" => "ahdgajhg", "amt" => 3, "title" => "3LittleBear", "pic" => "https://unsplash.com/photos/df243fs9cTXY", "price" => 17);
        array_push($_SESSION['cart'], $addCart3);

        foreach ($_SESSION['cart'] as $id => $props) {
            if ($props['isbn'] == $tempISBN) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function checkUpdatedSessionPriceIntegrate() {

        $addCart3 = array("isbn" => "ahdgajhg", "amt" => 3, "title" => "3LittleBear", "pic" => "https://unsplash.com/photos/df243fs9cTXY", "price" => 17);
        $tempISBN = $addCart3["isbn"];
        $tempPrice = $addCart3["price"];

        foreach ($_SESSION['cart'] as $id => $props) {
            if ($props['isbn'] == $tempISBN) {
                $_SESSION['cart'][$id]['amt']++;
                $_SESSION['cart'][$id]['price'] = $tempPrice * $_SESSION['cart'][$id]['amt'];
            }
            return $_SESSION['cart'];
        }
    }

}
