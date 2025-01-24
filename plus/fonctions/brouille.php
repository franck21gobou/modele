<?php
function brouille($myString, $type)
{

   // Store the cipher method
   $ciphering = "AES-128-CTR";
   // Use OpenSSl Encryption method
   $iv_length = openssl_cipher_iv_length($ciphering);
   $options = 0;
   // Non-NULL Initialization Vector for encryption
   $encryption_iv = '1234567891011121';
   // Store the encryption key
   $encryption_key = "MerciFranck";
   // Use openssl_encrypt() function to encrypt the data
   $encryption = openssl_encrypt(
      $myString,
      $ciphering,
      $encryption_key,
      $options,
      $encryption_iv
   );

   if ($type == "encrypt") {
      // Display the encrypted string
      return $encryption;
   }


   // Non-NULL Initialization Vector for decryption
   $decryption_iv = '1234567891011121';

   // Store the decryption key
   $decryption_key = "MerciFranck";

   // Use openssl_decrypt() function to decrypt the data
   $decryption = openssl_decrypt(
      $myString,
      $ciphering,
      $decryption_key,
      $options,
      $decryption_iv
   );
   if ($type == "decrypt") { // Display the decrypted string
      return $decryption;
   }

   return "";
}
