<?php

namespace Encryption\Package;

class EncryptionClient {

    private $encrypt_method = "AES-256-CBC";
    private $secret_key = 'This is my secret key';
    private $secret_iv = 'This is my secret iv';
    private $key = "";
    private $iv = "";

    public function __construct() {
        // hash
        $this->key = hash('sha256', $this->secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $this->iv = substr(hash('sha256', $this->secret_iv), 0, 16);
    }

    public function encrypt($string) {

        $output = openssl_encrypt($string, $this->encrypt_method, $this->key, 0, $this->iv);
        return base64_encode($output);
    }

    public function decrypt($string) {
        return openssl_decrypt(base64_decode($string), $this->encrypt_method, $this->key, 0, $this->iv);
    }

}
