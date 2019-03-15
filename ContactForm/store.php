<?php
/**
 * Created by PhpStorm.
 * User: paava
 * Date: 3/14/2019
 * Time: 7:14 PM
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

$name = $_GET('name');
$email = $_GET('email');
$phone = $_GET('phone');
$address = $_GET('address');
$order = $_GET('order');

$s = "INSERT INTO orders (Email,Name,Address,Details) VALUES ('$email', '$name','$address','$order')";
mysqli_query($connect,$s);