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
    <title>Checkout</title>
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



    <!--
    //////////////////////////////////////////////////////

    Free TEMPLATE
    DESIGNED & DEVELOPED by free-template.co

    Website:    https://free-template.co
    Email:      freetemplate.co@gmail.com
    Twitter:    https://twitter.com/Free_Templateco
    Facebook:   https://www.facebook.com/Free.Template.co/

    //////////////////////////////////////////////////////
    -->
  </head>
  <body class="bg-light">

    <body data-spy="scroll" data-target="#ftco-navbar-spy" data-offset="0">

    <div class="site-wrap">

      <header class="site-header">

        <div class="row align-items-center">
          <div class="col-5 col-md-3">
          </div>
          <div class="col-2 col-md-6 text-center site-logo-wrap">
            <a href="index.html" class="site-logo">Enthalpy</a>
          </div>

        </div>

      </header> <!-- site-header -->
        <!--Item Selection-->
        <div class="section split-left"  data-aos="fade-up" id="breakfast-to-go">
    <div class="container-contact100">
    <?php if(count($_SESSION['id'])==0){
        ?>
        The cart is empty
        <?php }
        else{
        ?>
        <div class="table table-hover">
          <div class="row p-3">
              <div class="col-sm-4">Product</div>
              <div class="col-sm-3">Price</div>
          </div>
        <?php
        $totalprice=0;
        for($i=0;$i<count($_SESSION['id']);$i++){
                $totalprice+=$_SESSION['price'][$i];?>
            <div class="row p-3">
              <div class="col-sm-4"><?php echo $_SESSION['name'][$i];?></div>
              <div class="col-sm-3"><?php echo $_SESSION['price'][$i];?></div>
              <div class="col-sm-3">
                <form action="dropitem.php" method="post">
                 <input type="hidden" name="item" value='<?php echo $i;?>'>
                 <input type="submit" class="btn" value="×">
                </form>
              </div>
            </div>
        <?php } ?>
            <div class="row p-3">
              <div class="col-sm-4"><strong>SubTotal</strong></div>
              <div class="col-sm-3"><strong><?php echo $totalprice ?></strong></div>
              <div class="col-sm-3"></div>
            </div>
            <?php $tax=round($totalprice*0.06625,2); $taxedtotal=$totalprice+$tax; ?>
            <div class="row p-3">
              <div class="col-sm-4"><strong>Tax</strong></div>
              <div class="col-sm-3"><strong><?php echo $tax ?></strong></div>
              <div class="col-sm-3"></div>
            </div>
            <div class="row p-3">
              <div class="col-sm-4"><strong>Total</strong></div>
              <div class="col-sm-3"><strong><?php echo $taxedtotal ?></strong></div>
              <div class="col-sm-3"></div>
            </div>
        </div>
        <?php } ?>
</div>
    </div>
        <!--Order information-->
        <div class="split-right container-contact100 col-md-3 ">
          <br>
          <br>
          <h2> Order Information</h2>
          <form action="store.php" method="post">
            <div class="form-group">
              <input type="hidden" name="total" value='<?php echo $taxedtotal ?>'>
              <label for="headcount" class="label">Headcount</label>
                <div class="form-field-icon-wrap">
                  <select name="headcount"  class="form-control" id="headcount">
                <?php
                  for ($i=1; $i<100; $i++){?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php } ?>
                    <option value="100">100+</option>
                  </select>
                </div>
            </div>
              <div class="form-group">
                <label for="name" class="label">Name</label>
                <div class="form-field-icon-wrap">
                  <span class="icon ion-android-person"></span>
                  <input type="text" name="name"  class="form-control" id="name">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="label">Email</label>
                <div class="form-field-icon-wrap">
                  <span class="icon ion-email"></span>
                  <input type="email" name="email" class="form-control" id="email">
                </div>
              </div>
              <div class="form-group ">
                <label for="phone" class="label">Phone</label>
                <div class="form-field-icon-wrap">
                  <span class="icon ion-android-call"></span>
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>
              </div>
              <div class="form-group ">
                <label for="street-addr" class="label">Street Address</label>
                <div class="form-field-icon-wrap">
                  <input type="text" class="form-control" id="street-addr" name="street-addr">
                </div>
              </div>
              <div class="form-group ">
                <label for="phone" class="label">City</label>
                <div class="form-field-icon-wrap">

                  <input type="text" class="form-control" id="city" name="city">
                </div>
              </div>
                  <div class="form-group ">
                    <label for="State" class="label">State</label>
                    <div class="form-field-icon-wrap">
                      <span class="icon ion-android-arrow-dropdown"></span>
                      <select name="State" id="state" class="form-control">
                         <option disabled selected value> -- select an option -- </option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="zipcode" class="label">Zip Code</label>
                    <div class="form-field-icon-wrap">
                      <input type="text" class="form-control" id="zipcode" name="zipcode">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="date" class="label">Date</label>
                    <div class="form-field-icon-wrap">
                      <span class="icon ion-calendar"></span>
                      <input type="text" class="form-control" id="date" name="date">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="time" class="label">Time</label>
                    <div class="form-field-icon-wrap">
                      <span class="icon ion-android-time"></span>
                      <input type="text" class="form-control" id="time" name="time">
                    </div>
                  </div>
                <div class="row justify-content-center">
                  <div class="col-md-auto">
                    <input type="submit" class="btn btn-primary btn-outline-primary btn-block" value="Order">
                  </div>
                </div>
              </form>
            </div>
          </div>
       <!-- .section -->
      <!-- loader -->
      <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff7a5c"/></svg></div>

      <script src="js/jquery-3.2.1.min.js"></script>
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


      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

      <script src="js/main.js"></script>
    </body>
</html>
