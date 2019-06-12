<?php

session_start();
session_set_cookie_params(0, "/E/", "enthalpylogistics.com");
$sidvalue= session_id(); echo "<br>Your session id  " . $sidvalue . "<br>";
$_SESSION=array();
session_destroy();
setcookie("PHPESSID","", time()-3600,'/',"", 0,0);
echo "Your session is terminated";

?>