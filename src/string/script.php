<?php

/*
List of encryption methods:
AES-128-CBC
AES-128-CFB
AES-128-CFB1
AES-128-CFB8
AES-128-CTR
AES-128-ECB
AES-128-OFB
AES-128-XTS
AES-192-CBC
AES-192-CFB
AES-192-CFB1
AES-192-CFB8
AES-192-CTR
AES-192-ECB
AES-192-OFB
AES-256-CBC
AES-256-CFB
AES-256-CFB1
AES-256-CFB8
AES-256-CTR
AES-256-ECB
AES-256-OFB
AES-256-XTS
*/

//Function to encrypt a string
function encrypt($string, $key, $encrypt_method) {
    $output = false;
    $secret_iv = 'This is my secret iv';
    $key = hash('sha256', $key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
    return $output;
}

//Function to decrypt a string using AES-256-CBC
function decrypt($string, $key, $decrypt_method) {
    $output = false;
    //$decrypt_method = "AES-256-CBC";
    $secret_iv = 'This is my secret iv';
    $key = hash('sha256', $key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_decrypt(base64_decode($string), $decrypt_method, $key, 0, $iv);
    return $output;
}
$encstring = encrypt("banana", '12345678', 'AES-256-CTR');
echo "Encrypted: " . $encstring;
echo "Descrypted: " . decrypt($encstring, '12345678', 'AES-256-CTR');
?>