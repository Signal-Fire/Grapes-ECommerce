<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 27/02/15
 * Time: 14:11
 */
include 'main.php';
$password = $_POST['newpass'];
    if (strlen($password) >= 8 && preg_match("#[0-9]+#", $password) && preg_match("#[a-zA-Z]+#", $password)) {
        change_password($password);
    } else {
        header("location: account.php?e=2");
    }
?>