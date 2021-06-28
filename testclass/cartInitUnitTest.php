<?php

class cartInitUnitTest {

    public function getRedirect() {
        header("Location: ../home.php");
    }

    public function validateInitSessionIsEmpty() {

        $_SESSION['cart'] = array();

        return $_SESSION['cart'];
    }

}
