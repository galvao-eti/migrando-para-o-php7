<?php
function encrypt($data)
{
    return bin2hex(mcrypt_encrypt(CRYPTO_CIPHER, hex2bin(CRYPTO_KEY), $data, CRYPTO_MODE, hex2bin(CRYPTO_IV)));
}

function decrypt($data)
{
    return mcrypt_decrypt(CRYPTO_CIPHER, hex2bin(CRYPTO_KEY), hex2bin($data), CRYPTO_MODE, hex2bin(CRYPTO_IV));
}
