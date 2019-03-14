<?php
/**
 * Created by PhpStorm.
 * User: paava
 * Date: 3/11/2019
 * Time: 9:53 PM
 */
ob_start();
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
$user = $_GET["username"];
$password = $_GET["pass"];
$therole = null;

$s="SELECT pass from users where username='$user'";
$t=mysqli_query($connect,$s);
$row=mysqli_fetch_row($t);
$thePassword = $row[0];
//echo "------------------";
//echo $thePassword;
//echo "------------------";
if(password_verify($password, $thePassword)){
    $response = 'true';
    //echo "we in boiis";
}
else $response = 'false';
if ($thePassword == ""){
    $response = 'false';
}
//echo $response;
if ($response == 'true'){
    $q="SELECT roles from users where username='$user'";
    $w=mysqli_query($connect,$q);
    $rowe=mysqli_fetch_row($w);
    $therole = $rowe[0];
    if ($therole == "res"){
        header('Location: http://enthalpylogistics.com/ContactForm/index.html');
        die();
    }
    if ($therole == "admin"){
        echo "admin yes";
    }
}

if (is_null($therole)){
    echo"Not Logged In<br>";
    header('Location: http://enthalpylogistics.com/');
    die();
}

mysqli_free_result($t);
mysqli_free_result($w);
mysqli_close($connect);
exit();