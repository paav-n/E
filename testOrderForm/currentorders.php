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
    <link rel="icon" type="image/png" href="images/Polaxicon.png"/>
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
        <table>
          <tr>
            <th class="column1">OrderID</th>
            <th class="column2">Date Ordered</th>
            <th class="column3">Address</th>
            <th class="column4">Headcount</th>
            <th class="column5">Delivery Time</th>
            <th class="column6">Total</th>
          </tr>
          <tr>
            <td class="column1"><?php echo $row['OrderId']?></td>
            <td class="column2"><?php echo $row['Date']?></td>
            <td class="column5"><?php echo $row['Address']?></td>
            <td class="column6"><?php echo $row['Headcount']?></td>
            <td class="column7"><?php echo $row['deliverytime']?></td>
            <td class="column8"><?php echo $row['Total']?></td>
          </tr>
      <tr>
        <th class="column2">Name</th>
        <th class="column3">Price</th>
      </tr>
      <?php
      $items = explode(",", $row['FullOrder']);
      foreach ($items as $itemID) {
        $itemsql = "SELECT * FROM Item WHERE ITEM_ID= '{$itemID}';";
        $x=mysqli_query($connect,$itemsql);
        $itemrow = $x->fetch_array(MYSQLI_ASSOC) ?>
        <tr>
        <td class="column1"><?php echo $itemrow['ITEM_NAME']?></td>
        <td class="column2"><?php echo $itemrow['ITEM_PRICE']?></td>
        </tr>
        <?php
      }
      ?>
      </table>
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
