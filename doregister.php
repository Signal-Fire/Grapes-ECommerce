<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 12/02/15
 * Time: 10:17
 */
include 'main.php';
//Encryption method
$password = $_POST['pass'];

if (strlen($password) >= 8 && preg_match("#[0-9]+#", $password) && preg_match("#[a-zA-Z]+#", $password)) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $key_value = "e14D8gF2";
        $encrypted = mcrypt_ecb(MCRYPT_DES, $key_value, $password, MCRYPT_ENCRYPT);
        register($_POST['email'], $_POST['fname'], $_POST['sname'], $_POST['pcode'], $encrypted);
    } else {
        header("location: register.php?e=3");
    }
} else {
    header("location: register.php?e=2");
}
?>