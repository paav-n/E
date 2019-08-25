<?php
/**
 * Created by PhpStorm.
 * User: paava
 * Date: 3/11/2019
 * Time: 9:53 PM
 */
session_start();
session_set_cookie_params(0,"/E");
ob_start();
$_SESSION["Logged"] = false;
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
$user = $_POST["username"];
$password = $_POST["pass"];
$email = $_POST["email"];
$therole = null;
$epass= password_hash($password, PASSWORD_BCRYPT);
$s="INSERT INTO users (username, roles, pass, email) values ('$user','res' ,'$epass', '$email')";
$t=mysqli_query($connect,$s);
if (is_null($therole)){
    echo"Account Created<br>";
    header('Location: http://enthalpylogistics.com/Login');
    die();
}

mysqli_free_result($t);
mysqli_free_result($w);
mysqli_close($connect);
exit();
?>