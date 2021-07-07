<?php
require_once '../action/reduce_cart_action.php';

class reduceCartQtyClass{
    
     public function testEnoughQtyToReduce($qty){
        if(enoughQty($qty)){
            return true;
        }
        else{
            return false;   
        }        
    }
    
    public function testReduceQty($id, $price){
        // Test data
        $data1 = array("amt" => 2, "title" => "Title1", "pic" => "Pic1", "price" => $price);
        $_SESSION['cart'] = array("1"=>$data1);
        
        // Test Func
        try{
            reduceItem($id, $price);
        }
        // Catch Undefined Index
        catch (Exception $ex) {
            return false;
        }
        
        if($_SESSION['cart'][$id]['amt'] == 1 && $_SESSION['cart'][$id]['price'] == $price * $_SESSION['cart'][$id]['amt']){
            return true;
        }
        else{
            return false;
        }
    }
    
}
