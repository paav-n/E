<?php
session_start();
if((count($_SESSION['id'])==1)){
$idremoval=array_shift($_SESSION['id']);
$nameremoval=array_shift($_SESSION['name']);
$priceremoval=array_shift($_SESSION['price']);

$_SESSION['id']=array_values($idremoval);
$_SESSION['name']=array_values($nameremoval);
$_SESSION['price']=array_values($priceremoval);
}
else{
$idremoval=$_SESSION['id'];
$nameremoval=$_SESSION['name'];
$priceremoval=$_SESSION['price'];

array_splice($idremoval,$_POST['item'],1);
array_splice($nameremoval,$_POST['item'],1);
array_splice($priceremoval,$_POST['item'],1);

$_SESSION['id']=$idremoval;
$_SESSION['name']=$nameremoval;
$_SESSION['price']=$priceremoval;
}
 header('Location: http://enthalpylogistics.com/testOrderForm/index.php');
    die();
?>
