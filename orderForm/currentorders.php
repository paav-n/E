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
  <title>Enthalpy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Raleway" rel="stylesheet">
<link rel="icon" type="image/png" href="../img/Polaxicon.png"/>
  <link rel="stylesheet" href="../search/css/bootstrap.css">
  <link rel="stylesheet" href="../search/css/animate.css">
  <link rel="stylesheet" href="../search/css/owl.carousel.min.css">

  <link rel="stylesheet" href="../search/fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../search/fonts/fontawesome/css/font-awesome.min.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="../search/css/style.css">
</head>
<header role="banner">

  <nav class="navbar navbar-expand-md navbar-dark bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.html">Enthalpy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
        <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
          <li class="nav-item">
            <a class="nav-link active" href="../search/index.html">Home</a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
          -->
        </ul>

      </div>
    </div>
  </nav>
</header>
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
                    $results = "SELECT * FROM orders ORDER BY OrderId DESC";
                    $w=mysqli_query($connect,$results);
                    while($row = $w->fetch_array(MYSQLI_ASSOC)) {
                      ?>

                      <div class="row mb-2">
                        <table>
                          <tr>
                            <th class="column1">OrderID</th>
                            <th class="column2">Date Ordered</th>
                            <th class="column3">Name</th>
                            <th class="column4">Email</th>
                            <th class="column5">Address</th>
                            <th class="column6">Headcount</th>
                            <th class="column7">Delivery Time</th>
                            <th class="column8">Total</th>
                          </tr>
                          <tr>
                            <td class="column1"><?php echo $row['OrderId']?></td>
                            <td class="column2"><?php echo $row['Date']?></td>
                            <td class="column3"><?php echo $row['Name']?></td>
                            <td class="column4"><?php echo $row['Email']?></td>
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
                        $itemsql = "SELECT * FROM Manhattan_Bagel WHERE ITEM_ID='{$itemID}';";
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
                      </div>
                      <div class="row ml-3">
                        <form action="editorder.php" method="post">
                          <input type="hidden" name="order" value=<?php echo $row['OrderId']?>>
                          <input type="submit" class="btn" value="edit order">
                        </form>
                      </div>
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
