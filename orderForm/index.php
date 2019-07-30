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
<!doctype html>
<html lang="en">
  <head>
    <title>Order Form</title>
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
  <div class="site-wrap">
  <nav class="site-menu" id="ftco-navbar-spy">
    <div class="site-menu-inner" id="ftco-navbar">
      <ul class="list-unstyled">
        <li><a href="#breakfast-for-the-bunch">Breakfast for the Bunch</a></li>
        <li><a href="#lunch-for-the-bunch">Lunch for the Bunch</a></li>
        <li><a href="#value-paks">Value Paks</a></li>
        <li><a href="#lunch-for-one"> Box'd Lunch for One</a></li>
        <li><a href="#salads-for-one">Box'd Salads for One</a></li>
        <li><a href="#beverages">Beverages</a></li>
      </ul>
    </div>
  </nav>

  <header class='site-header'>
  <div class='btn-toolbar pull-right'>
    <div class='btn-group'>
      <a class="btn btn-primary mr-4" href="/orderForm/currentorders.php">Orders</a>
      <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modalCart">Items</button>
    </div>
  </div>
  <div class="row align-items-center">
  <div class="col-5 col-md-3">
    <div class="left menu-burger-wrap">
      <a href="#" class="site-nav-toggle js-site-nav-toggle"><i></i></a>
    </div>
  </div>
  <div class="col-2 col-md-6 text-center site-logo-wrap">
    <a href="index.php" class="site-logo">Enthalpy</a>
  </div>
</div>
</header>
  <!-- Button trigger modal-->
  <div class="main-wrap " id="section-home">
    <div class="section col-md-6 text-center"  data-aos="fade-up">
    <h1>Manhattan Bagel</h1>
    </div>
  </div>
<div class="limiter" id="breakfast-for-the-bunch">
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
                    $results = "SELECT * FROM Manhattan_Bagel WHERE ITEM_SECTION > '0' ORDER BY ITEM_SECTION";
                    $w=mysqli_query($connect,$results);
?>
<h2 class="ml-3">Breakfast for the Bunch</h2>
<?php
                    while(($row = $w->fetch_array(MYSQLI_ASSOC)) && $row['ITEM_SECTION']==1) {
                        ?>
                        <div class="row ml-3 mb-5">
                            <div class="col-sm-3"><b><?php echo $row['ITEM_NAME']?></b></div>
                            <div class="col-sm-4"><?php echo $row['ITEM_DESCRIPTION']?></div>
                            <div class="col-sm-3"><i><?php echo $row['ITEM_PRICE']?></i></div>
                            <div class="col-sm-2">
				<form action="additem.php" method="post">
					<input type="hidden" name="id" value='<?php echo $row['ITEM_ID']?>'>
					<input type="hidden" name="name" value='<?php echo $row['ITEM_NAME']?>'>
					<input type="hidden" name="price" value='<?php echo $row['ITEM_PRICE']?>'>
					<input type="submit" class="btn" value="add">
				</form>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
</div>
<?php if($row['ITEM_SECTION']==2){?>
<div class="limiter" id="lunch-for-the-bunch">
<h2 class="ml-3">Lunch for the Bunch</h2>
<?php
                    do{
                        ?>
                        <div class="row ml-3 mb-5">
                            <div class="col-sm-3"><b><?php echo $row['ITEM_NAME']?></b></div>
                            <div class="col-sm-4"><?php echo $row['ITEM_DESCRIPTION']?></div>
                            <div class="col-sm-3"><i><?php echo $row['ITEM_PRICE']?></i></div>
                            <div class="col-sm-2">
        <form action="additem.php" method="post">
          <input type="hidden" name="id" value='<?php echo $row['ITEM_ID']?>'>
          <input type="hidden" name="name" value='<?php echo $row['ITEM_NAME']?>'>
          <input type="hidden" name="price" value='<?php echo $row['ITEM_PRICE']?>'>
          <input type="submit" class="btn" value="add">
        </form>
                            </div>
                        </div>

                        <?php
                    } while(($row = $w->fetch_array(MYSQLI_ASSOC)) && $row['ITEM_SECTION']==2);
                    ?>
<?php }?>
</div>

<?php if($row['ITEM_SECTION']==3){?>
<div class="limiter" id="value-paks">
<h2 class="ml-3">Value Paks</h2>
<?php
                    do{
                        ?>
                        <div class="row ml-3 mb-5">
                            <div class="col-sm-3"><b><?php echo $row['ITEM_NAME']?></b></div>
                            <div class="col-sm-4"><?php echo $row['ITEM_DESCRIPTION']?></div>
                            <div class="col-sm-3"><i><?php echo $row['ITEM_PRICE']?></i></div>
                            <div class="col-sm-2">
        <form action="additem.php" method="post">
          <input type="hidden" name="id" value='<?php echo $row['ITEM_ID']?>'>
          <input type="hidden" name="name" value='<?php echo $row['ITEM_NAME']?>'>
          <input type="hidden" name="price" value='<?php echo $row['ITEM_PRICE']?>'>
          <input type="submit" class="btn" value="add">
        </form>
                            </div>
                          </div>
                        <?php
                    } while(($row = $w->fetch_array(MYSQLI_ASSOC)) && $row['ITEM_SECTION']==3);
                    ?>
<?php }?>
</div>

<?php if($row['ITEM_SECTION']==4){?>
<div class="limiter" id="lunch-for-one">
<h2 class="ml-3">Lunch for One</h2>
<?php
                    do{
                        ?>
                        <div class="row ml-3 mb-5">
                            <div class="col-sm-3"><b><?php echo $row['ITEM_NAME']?></b></div>
                            <div class="col-sm-4"><?php echo $row['ITEM_DESCRIPTION']?></div>
                            <div class="col-sm-3"><i><?php echo $row['ITEM_PRICE']?></i></div>
                            <div class="col-sm-2">
				<form action="additem.php" method="post">
					<input type="hidden" name="id" value='<?php echo $row['ITEM_ID']?>'>
					<input type="hidden" name="name" value='<?php echo $row['ITEM_NAME']?>'>
					<input type="hidden" name="price" value='<?php echo $row['ITEM_PRICE']?>'>
					<input type="submit" class="btn" value="add">
				</form>
                            </div>
                        </div>
                        <?php
                    } while(($row = $w->fetch_array(MYSQLI_ASSOC)) && $row['ITEM_SECTION']==4);}
                    ?>
</div>

<?php if($row['ITEM_SECTION']==5){?>
<div class="limiter" id="salads-for-one">
<h2 class="ml-3">Box'd Salads for One</h2>
<?php
                    do{
                        ?>
                        <div class="row ml-3 mb-5">
                            <div class="col-sm-3"><b><?php echo $row['ITEM_NAME']?></b></div>
                            <div class="col-sm-6"><?php echo $row['ITEM_DESCRIPTION']?></div>
                            <div class="col-sm-3"><i><?php echo $row['ITEM_PRICE']?></i></div>
                            <div class="col-sm-2">
				<form action="additem.php" method="post">
					<input type="hidden" name="id" value='<?php echo $row['ITEM_ID']?>'>
					<input type="hidden" name="name" value='<?php echo $row['ITEM_NAME']?>'>
					<input type="hidden" name="price" value='<?php echo $row['ITEM_PRICE']?>'>
					<input type="submit" class="btn" value="add">
				</form>
                            </div>
                       </div>
                        <?php
                    } while(($row = $w->fetch_array(MYSQLI_ASSOC)) && $row['ITEM_SECTION']==5);
                    }?>
</div>

<?php if($row['ITEM_SECTION']==6){?>
<div class="limiter" id="beverages">
<h2 class="ml-3">Beverages</h2>
<?php
                    do{
                        ?>
                        <div class="row ml-3 mb-5">
                            <div class="col-sm-3"><b><?php echo $row['ITEM_NAME']?></b></div>
                            <div class="col-sm-4"><?php echo $row['ITEM_DESCRIPTION']?></div>
                            <div class="col-sm-3"><i><?php echo $row['ITEM_PRICE']?></i></div>
                            <div class="col-sm-2">
				<form action="additem.php" method="post">
					<input type="hidden" name="id" value='<?php echo $row['ITEM_ID']?>'>
					<input type="hidden" name="name" value='<?php echo $row['ITEM_NAME']?>'>
					<input type="hidden" name="price" value='<?php echo $row['ITEM_PRICE']?>'>
					<input type="submit" class="btn" value="add">
				</form>
                            </div>
                        </div>
                        <?php
                    } while(($row = $w->fetch_array(MYSQLI_ASSOC)) && $row['ITEM_SECTION']==6);}?>
</div>


<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Your cart</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
<?php if(count($_SESSION['id'])==0){
	?>
	The cart is empty
	<?php }
	else{
	?>
        <div class="table table-hover">
          <div class="row p-3">
              <div class="col-sm-6">Product</div>
              <div class="col-sm-4">Price</div>
          </div>
	<?php
	$totalprice=0;
	for($i=0;$i<count($_SESSION['id']);$i++){
		$totalprice+=$_SESSION['price'][$i];?>
            <div class="row p-3">
              <div class="col-sm-6"><?php echo $_SESSION['name'][$i];?></div>
              <div class="col-sm-4"><?php echo $_SESSION['price'][$i];?></div>
              <div class="col-sm-2">
		<form action="dropitem.php" method="post">
		 <input type="hidden" name="item" value='<?php echo $i;?>'>
		 <input type="submit" class="btn" value="×">
		</form>
              </div>
            </div>
	<?php } ?>
            <div class="row p-3">
              <div class="col-sm-6"><strong>Subotal</strong></div>
              <div class="col-sm-4"><strong><?php echo $totalprice ?></strong></div>
              <div class="col-sm-4"></div>
            </div>
            <?php $tax=round($totalprice*0.06625,2); $taxedtotal=$totalprice+$tax; ?>
            <div class="row p-3">
              <div class="col-sm-6"><strong>Tax</strong></div>
              <div class="col-sm-4"><strong><?php echo $tax ?></strong></div>
              <div class="col-sm-4"></div>
            </div>
            <div class="row p-3">
              <div class="col-sm-6"><strong>Total</strong></div>
              <div class="col-sm-4"><strong><?php echo $taxedtotal ?></strong></div>
              <div class="col-sm-4"></div>
            </div>
        </div>
	<?php } ?>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <a class="btn btn-primary" href="/orderForm/checkout.php">Checkout</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff7a5c"/></svg></div>

<script type="text/javascript">
$('add-item').on('click',function(){
  var data = $.parseJSON($(this).attr('data-button'));
  var adder='<tr><td>'+data.id+'</td><td>'+data.name+'</td><td>'+data.price+'</td></tr>';
        $('#shopping-cart').append(adder);
});
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
