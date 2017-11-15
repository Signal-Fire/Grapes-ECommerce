<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 22/02/15
 * Time: 19:07
 */
include 'main.php';
$key_value = "e14D8gF2";
$encrypted = mcrypt_ecb(MCRYPT_DES, $key_value, $_POST['pass'], MCRYPT_ENCRYPT);

login($_POST['email'], $encrypted);
?>