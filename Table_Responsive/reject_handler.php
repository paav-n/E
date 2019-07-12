<?php
$host_name = 'db777190816.hosting-data.io';
$database = 'db777190816';
$user_name = 'dbo777190816';
$password = 'Singhi1234!';

$connect = mysqli_connect($host_name, $user_name, $password, $database);
if (mysqli_connect_errno()) {
    die('<p>Failed to connect to MySQL: '.mysqli_error().'</p>');
}
mysqli_select_db($connect, $database);



?>
<html>
<body>
<form method="POST" action="">
    <p>Can you specify for the customer why you are you not accepting this order?</p>
    <input type="text" name="comments"><br>
    <input type="submit" name="submit" value="Submit">
</form>
<?php

if(isset($_POST['submit'])){
    $orderid=$_GET['orderid'];
    $updatestatement="Update orders set status='Rejected' where OrderId='$orderid'";
    if($connect->query($updatestatement)){
        echo "<h1>success</h1>";
    }
}
?>
</body>
</html>




