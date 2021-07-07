<?php
require_once '../action/remove_item_action.php';

class removeItemCartClass{
    
    public function testRemoveItem($id){
        // Test data
        $data1 = array("amt" => 2, "title" => "Title1", "pic" => "Pic1", "price" => "10");
        $_SESSION['cart'] = array($id=>$data1);
        
        // Test func
        try{
            removeItem($id);
        } catch (Exception $ex) {
            echo 'Remove ERROR: '.$ex->getMessage();
            return false;
        }
        
        if(!isset($_SESSION['cart'][$id])){
            return true;
        }
        else{
            return false;
        }
    }
    
}

