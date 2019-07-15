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
    $q="SELECT roles,email,business_name from users where username='$user'";
    $w=mysqli_query($connect,$q);
    $rowe=mysqli_fetch_row($w);
    $therole = $rowe[0];
    if ($therole == "patron"){
        $_SESSION["Logged"] = true;
        $_SESSION['email']=$rowe[1];
        $_SESSION["Role"] = "patron";
        $_SESSION['id']=array();
        $_SESSION['name']=array();
        $_SESSION['price']=array();
        $_SESSION['edit']=array();
        header('Location: http://enthalpylogistics.com/search/index.html');
        die();
    }
    if ($therole == "vendor"){
        $_SESSION["Logged"] = true;
        $_SESSION['email']=$rowe[1];
        $_SESSION["Role"] = "vendor";
        $_SESSION['id']=array();
        $_SESSION['name']=array();
        $_SESSION['price']=array();
        $_SESSION['business_name']=$rowe[2];
        $_SESSION['edit']=array();
        header('Location: http://enthalpylogistics.com/Table_Responsive/index.php');
        die();
    }
    if ($therole == "admin"){
        $_SESSION["Role"] = "admin";
        $_SESSION["Logged"] = true;
        header('Location: http://enthalpylogistics.com/Table_Responsive/index.php');
        die();
    }
    if ($therole == "maestro"){
        $_SESSION["Role"] = "admin";
        $_SESSION["Logged"] = true;
        header('Location: http://enthalpylogistics.com/Table_Responsive/index.php');
        die();
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
