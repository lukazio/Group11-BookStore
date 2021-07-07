<?php
class BookInfoCart {
    private $result;
    
    function add1Time($amt, $price) {
        $this->result = NULL;
        $this->result = $this->cartAction($amt, $price);
        
        if($this->result["amt"] == $amt && $this->result["price"] == $price*$amt)
            return true;
        else
            return false;
    }
    
    function addNTimes($amt, $price, $times = 0) {
        $this->result = NULL;
        $this->result = array("amt" => 0, "price" => 0);
        
        for ($a = 0; $a < $times; $a++) {
            $temp = $this->cartAction($amt, $price);
            $this->result["amt"] += $temp["amt"];
            $this->result["price"] += $temp["price"];
        }
        $amt *= $times;
        
        if($this->result["amt"] == $amt && $this->result["price"] == $price*$amt)
            return true;
        else
            return false;
    }
    
    private function cartAction($amt, $price) {
        $addCart = array("amt" => $amt, "price" => $amt*$price);
        $tempPrice = $price;
        $tempAmt = $amt;
        $tempCart = array("amt" => 0, "price" => 0);

        if (empty($cart))
            $tempCart = $addCart;
        else {
            $tempCart = $this->result;
            $tempCart["amt"] += $tempAmt;
            $tempCart["price"] = $tempPrice * $tempCart["amt"];
        }
        
        $cart = $tempCart;
            
        return $cart;
    }
}
