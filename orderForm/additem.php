<?php
session_start();
$_SESSION['id'][count($_SESSION['id'])]=$_POST['id'];
$_SESSION['name'][count($_SESSION['name'])]=$_POST['name'];
$_SESSION['price'][count($_SESSION['price'])]=$_POST['price'];
 header('Location: http://enthalpylogistics.com/orderForm/index.php');
    die();
?>
