<?php
session_start();
session_set_cookie_params(0,"/E");
$status= $_SESSION["Logged"];
if(!$status){
    //echo"Not Logged In<br>";
    header('Location: http://enthalpylogistics.com/Login');
    die();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Orders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../img/Polaxicon.png"/>
    <meta name="description" content="Free Template by Free-Template.co" />
    <meta name="keywords" content="free template, free bootstrap, free website template" />
    <meta name="author" content="Free-Template.co" />

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:300,400,700,800|Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>

    <body>
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
      $email=$_SESSION['email'];
      $results = "SELECT * FROM orders WHERE Email='{$email}';";
      $w=mysqli_query($connect,$results);
    ?>

    <h1>Orders</h1>

    <?php

      while($row = $w->fetch_array(MYSQLI_ASSOC)) {

        ?>
        <div class="section bg-light">
       <div class="row ml-3">
           <div class="col-md-2"><strong>OrderID</strong></div>
           <div class="col-md-2"><strong>Date Ordered</strong></div>
           <div class="col-md-2"><strong>Address</strong></div>
           <div class="col-md-2"><strong>Headcount</strong></div>
           <div class="col-md-2"><strong>Delivery Time</strong></div>
           <div class="col-md-2"><strong>Total</strong></div>
       </div>
         <div class="row ml-3">
           <div class="col-md-2"><?php echo $row['OrderId']?></div>
           <div class="col-md-2"><?php echo $row['Date']?></div>
           <div class="col-md-2"><?php echo $row['Address']?></div>
           <div class="col-md-2"><?php echo $row['Headcount']?></div>
           <div class="col-md-2"><?php echo $row['deliverytime']?></div>
           <div class="col-md-2"><?php echo $row['Total']?></div>
         </div>
     <div class="row ml-5">
       <div class="col-md-2"><strong>Name</strong></div>
       <div class="col-md-2"><strong>Price</strong></div>
     </div>
     <?php
     $items = explode(",", $row['FullOrder']);
     foreach ($items as $itemID) {
       $itemsql = "SELECT * FROM Manhattan_Bagel WHERE ITEM_ID= '{$itemID}';";
       $x=mysqli_query($connect,$itemsql);
       $itemrow = $x->fetch_array(MYSQLI_ASSOC) ?>
       <div class="row ml-5">
       <div class="col-md-4"><?php echo $itemrow['ITEM_NAME']?></div>
       <div class="col-md-4"><?php echo $itemrow['ITEM_PRICE']?></div>
       </div>
       <?php
     }
     ?>
     <div class="row ml-3">
     <form action="editorder.php" method="post">
     <input type="hidden" name="order" value=<?php echo $row['OrderId']?>>
     <input type="submit" class="btn" value="edit order">
     </form>
     </div>
     </div>
      <?php } ?>

    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>

    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    <script src="js/jquery.easing.1.3.js"></script>

    <script src="js/aos.js"></script>


    <script src="js/main.js"></script>
    </body>

    </html>
