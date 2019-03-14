<?php
/**
 * Created by PhpStorm.
 * User: paava
 * Date: 3/11/2019
 * Time: 9:53 PM
 */

$host_name = 'db777190816.hosting-data.io';
$database = 'db777190816';
$user_name = 'dbo777190816';
$password = 'b3_Yq8WXMwhLeTh';

$connect = mysqli_connect($host_name, $user_name, $password, $database);
if (mysqli_errno()) {
    die('<p>Failed to connect to MySQL: '.mysqli_error().'</p>');
} else {
    echo '<p>Connection to MySQL server successfully established.</p >';
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