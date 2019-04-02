<?php

namespace Encryption\Package;

use Encryption\Package\EncryptionClient;

class EncryptionFactory {

    public static function create() {
        return new EncryptionClient();
    }

}