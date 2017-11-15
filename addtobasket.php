<?php
    include 'main.php';
    add_to_basket(key($_POST));
    header("location: basket.php");
?>