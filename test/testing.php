<?php

class TestPassword {
    
    public function checkPassword($password){
        
        $errorcount = 0;
        
        if($errorcount == 0){
            if(strlen($password) <'8'){
              return false;
              $errorcount++; 
            }elseif(!preg_match("#[0-9]+#",$password)){
              return false;
              $errorcount++;
            }elseif(!preg_match("#[A-Z]+#",$password)){
              return false;
              $errorcount++;
            }elseif(!preg_match("#[a-z]+#",$password)){
              return false;
              $errorcount++;
            }elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$password)){
              return false;
              $errorcount++;
            }
        }
        
        return true;
    }
}

