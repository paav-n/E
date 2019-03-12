<?php
/**
 * Created by PhpStorm.
 * User: paava
 * Date: 3/11/2019
 * Time: 9:53 PM
 */

$hostname = "localhost";
$username = "root";
$project  = "enthalpy";
$password = "Singhe1234!";
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_select_db( $db, $project );
$username = $_POST [ "username" ] ;
$password = $_POST [ "pass" ] ;
$s="SELECT pass from users where username='username'";
$t=mysqli_query($db,$s);
$row=mysqli_fetch_row($t);
$thepassword = $row[0];
$hash = password_hash($password, PASSWORD_DEFAULT);
if(password_verify($thepassword, $hash)){
    $response = 'true';
}
else $response = 'false';
if ($thepassword == ""){
    $response = 'false';
}

if ($response == 'true'){
    $q="SELECT roles from users where username='username'";
    $w=mysqli_query($db,$q);
    $rowe=mysqli_fetch_row($w);
    $therole = $rowe[0];
    if ($therole == "restaurant"){
        echo "res";
    }
    if ($therole == "admin"){
        echo "admin";
    }
}



mysqli_free_result($t);
mysqli_free_result($w);
mysqli_close($db);
exit();