<?php

class cartAddingUnitTest {

    public function addingNewItem($addCart) {
        $_SESSION['cart'] = array();

        if ($addCart != null) {
            array_push($_SESSION['cart'], $addCart);
        }

        return $_SESSION['cart'];
    }

    public function checkAddedSessionElement($addCart, $key) {
        $_SESSION['cart'] = array();

        array_push($_SESSION['cart'], $addCart);

        return $_SESSION['cart'][0][$key];
    }
}
