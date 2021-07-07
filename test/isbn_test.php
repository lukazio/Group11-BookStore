<?php
class Isbn {
    function checkISBN($isbn){
        if(preg_match("/^97[89](\d{9}(?:\d|X))$/", $isbn))
            return true;
        else
            return false;
    }
}
