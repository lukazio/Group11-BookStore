<?php
require_once '../action/add_cart_action.php';

class addCartQtyClass{
    
    public function testEnoughStockToAdd($stockAmt){
        if(enoughStock($stockAmt)){
            return true;
        }
        else{
            return false;   
        }        
    }
    
    public function testAddQty($id, $price){
        // Test data
        $data1 = array("amt" => 1, "title" => "Title1", "pic" => "Pic1", "price" => $price);
        $_SESSION['cart'] = array("1"=>$data1);
        
        // Test Func
        try{
            addItem($id, $price);
        }
        // Catch Undefined Index
        catch (Exception $ex) {
            return false;
        }
        
        if($_SESSION['cart'][$id]['amt'] == 2 && $_SESSION['cart'][$id]['price'] == $price * $_SESSION['cart'][$id]['amt']){
            return true;
        }
        else{
            return false;
        }
    }
    
}

