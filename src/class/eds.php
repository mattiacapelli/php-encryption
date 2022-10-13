<?php
/*
EDS - Encrypt and Decrypt String using all the AES method
*/

class eds 
{
    private $method;
    private $key;
    private $iv;

    public function __construct($method, $key, $iv) {
        $this->$method = $method;
        $this->$key = $key;
        $this->$iv = $iv;
    }
}

?>