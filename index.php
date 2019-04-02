<?php
include './EncryptionPackage/autoloader.php';

use Encryption\Package\EncryptionFactory;

$encryption_client = EncryptionFactory::create();
$encrypt_text = $encryption_client->encrypt("encrypt me");

echo $encrypt_text."<br />";

$decrypt_text = $encryption_client->decrypt($encrypt_text);

echo $decrypt_text."<br />";