<?php
class Response {
    function checkOK($url){
        $response = get_headers($url);
        if($response[0] == 'HTTP/1.1 200 OK')
            return true;
        return false;
    }
    
    function checkNotFound($url){
        $response = get_headers($url);
        if($response[0] == 'HTTP/1.1 404 Not Found')
            return true;
        return false;
    }
    
    function checkFound($url){
        $response = get_headers($url);
        if($response[0] == 'HTTP/1.1 302 Found')
            return true;
        return false;
    }
}
