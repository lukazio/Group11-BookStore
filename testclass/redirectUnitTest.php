<?php

class redirectUnitTest {

    public function redirect200() {
        return 'HTTP/1.1 200 OK';
    }

    public function redirect404() {
        return 'HTTP/1.1 404 Not Found';
    }
}
