<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 23/02/15
 * Time: 02:18
 */
session_start();
setcookie('email', '', time() - 360000, '/');
setcookie('fname', '', time() - 360000, '/');
header("Location: index.php");
?>