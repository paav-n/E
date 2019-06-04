<?php
/**
 * Created by PhpStorm.
 * User: paava
 * Date: 3/14/2019
 * Time: 7:14 PM
 */
ob_start();
session_start();
session_set_cookie_params(0,"/E");
$status= $_SESSION["Logged"];
if(!$status){
    //echo"Not Logged In<br>";
    header('Location: http://enthalpylogistics.com/');
    die();
}
$host_name = 'db777190816.hosting-data.io';
$database = 'db777190816';
$user_name = 'dbo777190816';
$password = 'Singhi1234!';

$connect = mysqli_connect($host_name, $user_name, $password, $database);
if (mysqli_connect_errno()) {
    die('<p>Failed to connect to MySQL: '.mysqli_error().'</p>');
} else {
    echo '<p>Connection to MySQL server successfully established.</p >';
}

mysqli_select_db($connect, $database);

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$order = $_GET['order'];

$s = "INSERT INTO orders (Email,Name,Address,Details) VALUES ('$email', '$name','$address','$order')";
mysqli_query($connect,$s);
//$to = "paavan@enthalpylogistics.com";
$subject = "Order Confirmation";

$message = "
<html>
<head>
<title>Order Confirmation</title>
</head>
<body>
<p>Thank you for ordering with Enthalpy Logistics</p>
<table>
<tr>
<th>Order Email</th>
<th>Delivery Address</th>
<th>Order Details </th>
</tr>
<tr>
<td>$email</td>
<td>$address</td>
<td>$order</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <konngerry@gmail.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail("gerry@enthalpylogistics.com",$subject,$message,$headers);

header('Location: http://enthalpylogistics.com/');
die();
