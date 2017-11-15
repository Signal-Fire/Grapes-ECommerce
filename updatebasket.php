<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 08/03/15
 * Time: 18:49
 */
include 'main.php';

$amounts = $_POST['amount'];
$pid = $_POST['id'];

updateBasket($pid, $amounts);
?>