
<?php

require_once dirname(__file__) . '/AES.php';
class aes_
{
  function enkripsi($key, $data)
  {
    
	  $aes = new Aes($key);
    $data_str = $aes->encrypt($data);
    
    return bin2hex($data_str);
  }
}
