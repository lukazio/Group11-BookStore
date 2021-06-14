<?php
session_start();
$id = $_GET['id'];
removeItem($id);

function removeItem($id){
    if(isset($_SESSION['cart'][$id])){
        unset($_SESSION['cart'][$id]);
        // Return success
        header('Location:../cart.php?remove=success');
    }
    else{
        // Return back with error msg
        header('Location:../cart.php?remove=fail');
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

