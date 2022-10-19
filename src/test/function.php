<?php

require_once '../function/string.php';

function testString($teststring, $key, $method) {
    $encrypted = encrypt($teststring, $key, $method);
    $decrypted = decrypt($encrypted, $key, $method);
    echo "Test string: $teststring \n";
    echo "Result encrypted: $encrypted \n";
    echo "Result decrypted: $decrypted \n";
    echo "-----------------------------------------------------------------" . "\n";
    echo 'Memory usage: ' . round(memory_get_usage() / 1048576, 2) . "M\n";
    echo "-----------------------------------------------------------------" . "\n";
    echo "\n";
}

function testFile($source, $dest, $key, $method) {
    encrypt_file($source, $dest, $key, $method);
    decrypt_file($dest, $dest, $key, $method);
    echo "Test file: $source \n";
    echo "Result encrypted: $dest \n";
    echo "-----------------------------------------------------------------" . "\n";
    echo 'Memory usage: ' . round(memory_get_usage() / 1048576, 2) . "M\n";
    echo "-----------------------------------------------------------------" . "\n";
    echo "\n";
}

testString("Hello World", "12345678901234567890123456789012", "AES-256-CFB");
testFile("./filetest/test.txt", "./filetest/test.txt", "12345678901234567890123456789012", "AES-256-CFB");

?>