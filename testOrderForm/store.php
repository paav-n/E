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
$name = $_POST['name'];
$email = $_SESSION['email'];
$phone = $_POST['phone'];
$street = $_POST['street-addr'];
$city = $_POST['city'];
$state=$_POST['State'];
 $zipcode=$_POST['zipcode'];
$totalprice=$_POST['total'];
$date=$_POST['date'];
$time=$_POST['time'];
$combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
$fulladdr=$street . ", " . $city . ", " . $state .  ", " . $zipcode;
$fullorder="";
$fullorderid="";
for($i=0;$i<count($_SESSION['id']);$i++){
$fullorderid.=$_SESSION['id'][$i];
if($i<count($_SESSION['id'])-1){
        $fullorderid.= ",";
      }
}
$s = "INSERT INTO orders (Email,Name,Address,deliverytime,Headcount,FullOrder, Total) VALUES ('$email', '$name','$fulladdr', '$combinedDT', '$headcount','$fullorderid', '$totalprice')";
for($i=0;$i<count($_SESSION['id']);$i++){
      $fullorder.=$_SESSION['name'][$i];
        if($i<count($_SESSION['id'])-1){
        $fullorder.= ", ";
      }
}

//$to = "paavan@enthalpylogistics.com";
$subject = "Order Confirmation test";

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
<th>Total Price</th>
<th>Order Details </th>
</tr>
<tr>
<td>$email</td>
<td>$fulladdr</td>
<td>$totalprice</td>
<td>$fullorder</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <gerry@enthalylogistics.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail("paavan@enthalpylogistics.com",$subject,$message,$headers);

header('Location: http://enthalpylogistics.com/');
die();
