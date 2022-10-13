<?php
/*
EDS - Encrypt and Decrypt String using all the AES method
*/

class eds 
{
    private $method;
    private $key;
    private $iv;
    openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
}

?>