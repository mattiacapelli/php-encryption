<?php
/*
EDS - Encrypt and Decrypt String using all the AES method
*/

class eds 
{
    public $method;
    public $key;
    public $iv;

    public function __construct($method, $key, $iv) {
        $this->method = $method;
        $this->key = $key;
        $this->iv = $iv;
    }

    public function Encrypt(string $toencrypt) {
        $output = false;
        $secret_iv = $this->iv;   
        $key = hash('sha256', $this->key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_encrypt($toencrypt, $this->encrypt_method, $key, 0, $iv);
        //$output = base64_encode($output);
        return $output;
    }

    public function Decrypt(string $todecrypt) {
        $output = false;
        $secret_iv = $this->iv;
        $key = hash('sha256', $this->key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($todecrypt), $this->decrypt_method, $key, 0, $iv);
        return $output;
    }

    public function GenerateIV (bool $checkit, bool $returnit, bool $saveit) {
        if ($checkit)
        {
            $wasItSecure = false;
            $iv = openssl_random_pseudo_bytes(16, $wasItSecure);
            if ($wasItSecure) {
                if ($returnit && $saveit) {
                    return $iv;
                    $this.$iv = $iv;
                } elseif ($returnit) {
                    return $iv;
                } elseif ($saveit) {
                    $this.$iv = $iv;
                } else {
                    return "Error001 -> Invalid Parameters";
                }
            }
        }
        
    }

    public function GenerateKey (bool $checkit, bool $returnit, bool $saveit) {
        if ($checkit)
        {
            $wasItSecure = false;
            $key = openssl_random_pseudo_bytes(32, $wasItSecure);
            if ($wasItSecure) {
                if ($returnit && $saveit) {
                    return $key;
                    $this.$key = $key;
                } elseif ($returnit) {
                    return $key;
                } elseif ($saveit) {
                    $this.$key = $key;
                } else {
                    return "Error001 -> Invalid Parameters";
                }
            }
        }
        
    }
}
?>