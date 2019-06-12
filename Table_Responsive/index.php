<?php
session_start();
session_set_cookie_params(0,"/E");
$status= $_SESSION["Logged"];
if(!$status){
    //echo"Not Logged In<br>";
    header('Location: http://enthalpylogistics.com/');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Table</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
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
                    $results = "SELECT * FROM orders JOIN OrderItems ON orders.OrderId=OrderItems.ORDERITEMS_ORDERID ORDER BY OrderId DESC";
                    $w=mysqli_query($connect,$results);
                    $lastrow=-1;
                    while($row = $w->fetch_array(MYSQLI_ASSOC)) {
                      if($row['OrderId']!=$lastrow){?>
                      <div class="row mb-5">
                        <div class="row p-auto col-md-2">Order:<?php echo $row['OrderId']?></div>
                        <div class="col-md-2"><?php echo $row['Name']?></div>
                        <div class="col-md-3"><?php echo $row['Email']?></div>
                        <div class="col-md-3"><?php echo $row['Date']?></div>
                        <div class="col-md-2"><?php echo $row['Address']?></div>
                      </div>
                      <div class="row ml-5">
                      Total:<?php echo $row['Total']?>
                      </div>
                        <?php
                        $lastrow=$row[OrderId];
                      }
                        ?>
                        <div class="l-3 col-sm-4"><?php echo $row['ORDERITEMS_NAME']?></div>
                        <div class="l-3 col-sm-4"><?php echo $row['ORDERITEMS_PRICE']?></div>
                        <?php
                    }
                    ?>
            </div>
        </div>
    </div>
</div>



<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
