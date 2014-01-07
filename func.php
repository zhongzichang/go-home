<?php

  // Function for basic field validation (present and neither empty nor only white space
function IsNullOrEmptyString($question)
{
  return ( !isset($question) || trim($question)==='' );
}

function GenerateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>