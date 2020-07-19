<?php

class aes
{
  private $password = 'KunciRahasia';

  private $method   = 'aes-256-cbc'; // AES 256 CBC (chipher block chaining)

  function enkripsi($data)
  {
    $password = substr(hash('sha256', $this->password, true), 0, 32);

    // IV (initialitation vector) harus tepat 16 blok karakter (128 bit)

    // IV is still 16 bytes or 128 bits for AES 128, 192 and 256.

    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

    // PROSES ENKRIPSI

    $encrypted = base64_encode(openssl_encrypt($data, $this->method, $password, OPENSSL_RAW_DATA, $iv));

    $result = str_ireplace("/", "1", $encrypted);
    return $result;
  }

  public function dekripsi($data)
  {

    // Password Harus tepat 32 karakter (256 bit)

    // 256-bit encryption key

    $password = substr(hash('sha256', $this->password, true), 0, 32);

    // IV (initialitation vector) harus tepat 16 blok karakter (128 bit)

    // IV is still 16 bytes or 128 bits for AES 128, 192 and 256.

    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

    // PROSES DESKRIPSI

    $decrypted = openssl_decrypt(base64_decode($data), $this->method, $password, OPENSSL_RAW_DATA, $iv);

    return $decrypted;
  }
}
