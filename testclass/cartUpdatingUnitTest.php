<?php

class cartUpdatingUnitTest {

    public function checkDuplicatedSessionBook($tempISBN) {

        $this->initialize_dummy_session_array();

        foreach ($_SESSION['cart'] as $id => $props) {
            if ($props['isbn'] == $tempISBN) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function checkUpdatedSessionAmt($tempISBN) {

        $this->initialize_dummy_session_array();

        foreach ($_SESSION['cart'] as $id => $props) {
            if ($props['isbn'] == $tempISBN) {
                $_SESSION['cart'][$id]['amt']++;
            }
            return $_SESSION['cart'][$id]['amt'];
        }
    }

    public function checkUpdatedSessionPrice($tempISBN, $tempPrice) {

        $this->initialize_dummy_session_array();

        foreach ($_SESSION['cart'] as $id => $props) {
            $_SESSION['cart'][$id]['price'] = $tempPrice * $_SESSION['cart'][$id]['amt'];
            if ($props['isbn'] == $tempISBN) {
                $_SESSION['cart'][$id]['amt']++;
                $_SESSION['cart'][$id]['price'] = $tempPrice * $_SESSION['cart'][$id]['amt'];
            }
            return $_SESSION['cart'][$id]['price'];
        }
    }

    function initialize_dummy_session_array() {
        $_SESSION['cart'] = array();
        $addCart = array("isbn" => "9791296965391", "amt" => 20, "title" => "Book of Life", "pic" => "https://unsplash.com/photos/DCzpr09cTXY", "price" => 5);
        return array_push($_SESSION['cart'], $addCart);
    }

}


