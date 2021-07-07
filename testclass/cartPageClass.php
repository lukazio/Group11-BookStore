<?php
require_once '../cart.php';

class cartPageClass {
    
    public function testAppendQuery($isbn1, $isbn2, $isbn3){
        // Test data
        $query = "SELECT * FROM book WHERE ";
        $data1 = array("isbn" => $isbn1, "amt" => 1, "title" => "Title1", "pic" => "Pic1", "price" => "Price1");
        $data2 = array("isbn" => $isbn2, "amt" => 2, "title" => "Title2", "pic" => "Pic2", "price" => "Price2");
        $data3 = array("isbn" => $isbn3, "amt" => 3, "title" => "Title3", "pic" => "Pic3", "price" => "Price3");
        $_SESSION['cart'] = array();
        array_push($_SESSION['cart'], $data1, $data2, $data3);
        
        // Run Test on Function
        $result = appendQuery($query);
        // if Test result satisfy above Test Data: TRUE
        if($result == 'SELECT * FROM book WHERE isbn='.$isbn1.' OR isbn='.$isbn2.' OR isbn='.$isbn3.' '){
            return true;
        }
        // else: FALSE
        else{
            return $result;
        }
    }
    
    public function testFuncResponseStatus($qtyFunc, $funcStatus){
        // Run Test on Function Response's Status
        $response = funcResponse($qtyFunc, $funcStatus);
        if($response["status"] == $funcStatus){
            return true;
        }
        else{
            return $response["status"];
        }
    }
    
    public function testFuncResponseMsg($qtyFunc, $funcStatus){
        $response = funcResponse($qtyFunc, $funcStatus);
        // Run Test on Function Response's Message based on Type of Func
        if($qtyFunc == "add"){
            if(strpos($response["msg"], "Add")){
                return true;
            }
            else{
                return $response["msg"];
            }
        }
        else if($qtyFunc == "reduce"){
            if(strpos($response["msg"], "Reduce")){
                return true;
            }
            else{
                return $response["msg"];
            }
        }
        else if($qtyFunc == "remove"){
            if(strpos($response["msg"], "Remove")){
                return true;
            }
            else{
                return $response["msg"];
            }
        }
        else{
            return false;
        }
    }
    
}

