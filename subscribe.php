<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 26/02/15
 * Time: 13:52
 */
    include 'main.php';
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        subscribe($_POST['email']);
    } else {
        header("location: newsletter.php?e=2");
    }
?>