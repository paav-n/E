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
    <link href="https://fonts.googleapis.com/css?family=Bungee&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../img/Polaxicon.png/">
    <title>Enthalpy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Raleway" rel="stylesheet">

    <link rel="stylesheet" href="../search/css/bootstrap.css">
    <link rel="stylesheet" href="../search/css/animate.css">
    <link rel="stylesheet" href="../search/css/owl.carousel.min.css">

    <link rel="stylesheet" href="../search/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../search/fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="../search/css/style.css">
  </head>
  <body>

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
                <a class="nav-link active" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../orderForm/currentorders.php">Orders</a>
              </li>
              <li class="nav-item">
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modalCart">Items</button>
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
       <!-- END header -->

       <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url('../search/images/kitchen.png');">
         <div class="container">
           <div class="row align-items-center site-hero-inner justify-content-center">
             <div class="col-md-8 text-center">

               <div class="mb-5 element-animate">
                 <h1>Current Orders</h1>
                 <p>View &amp; edit current orders.</p>
               </div>

             </div>
           </div>
         </div>
       </section>
       <!-- END section -->

       <section class="feature-destination bg-dark">
         <div class="container">
          <div class="row mb-3 element-animate">
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

            </div>

      </div>

    </section>
    <!-- END section -->
    <!-- END section -->
    <!-- END section -->
    <!-- END section -->
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
    <footer class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3 class="mb-4">About</h3>
            <p class="mb-4">Contact us to ask about an order, collaborate, or learn more!</p>
            <ul class="list-unstyled ">
              <li class="d-flex"><span class="mr-3"><span class="icon ion-ios-location"></span></span><span class="">Servicing the greater New York Area</span></li>
              <li class="d-flex"><span class="mr-3"><span class="icon ion-ios-telephone"></span></span><span class="">coming soon</span></li>
              <li class="d-flex"><span class="mr-3"><span class="icon ion-email"></span></span><span class="">info@enthalpylogistics.com</span></li>
            </ul>
          </div>
          <div class="col-md-2">
            <h3 class="mb-4">Links</h3>
            <ul class="list-unstyled ">
              <li><a href="#">About</a></li>
              <li><a href="#">Destination</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="mb-4">Latest Blog</h3>
            <ul class="list-unstyled blog-entry-footer">
              <li><a href="#">
                <span class="post-meta">March 20, 2018</span>
                <h3>7 Best Destination in The World</h3></a>
              </li>
              <li><a href="#">
                <span class="post-meta">March 20, 2018</span>
                <h3>4 Hour Work Week And The Rest Is Travel</h3></a>
              </li>
              <li><a href="#">
                <span class="post-meta">March 20, 2018</span>
                <h3>Why You Should Travel Today</h3></a>
              </li>
            </ul>
          </div>
                   <div class="col-md-3">
                     <h3>Connect</h3>
                     <p>
                       <!--
                       <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                       <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                       -->
                       <a href="https://instagram.com/enthalpylogistics" class="p-2"><span class="fa fa-instagram"></span></a>
                     </p>
                   </div>
                 </div>
                 <div class="row justify-content-center">
                   <div class="col-md-7 text-center">
                     <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
         Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
         <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                   </div>
                 </div>
               </div>
             </footer>
             <!-- END footer -->

             <!-- loader -->
             <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

             <script src="../search/js/jquery-3.2.1.min.js"></script>
             <script src="../search/js/jquery-migrate-3.0.0.js"></script>
             <script src="../search/js/popper.min.js"></script>
             <script src="../search/js/bootstrap.min.js"></script>
             <script src="../search/js/owl.carousel.min.js"></script>
             <script src="../search/js/jquery.waypoints.min.js"></script>
             <script src="../search/js/jquery.stellar.min.js"></script>

             <script>
               // This example displays an address form, using the autocomplete feature
               // of the Google Places API to help users fill in the information.

               // This example requires the Places library. Include the libraries=places
               // parameter when you first load the API. For example:
               // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

               var placeSearch, autocomplete;
               var componentForm = {
                 street_number: 'short_name',
                 route: 'long_name',
                 locality: 'long_name',
                 administrative_area_level_1: 'short_name',
                 country: 'long_name',
                 postal_code: 'short_name'
               };

               function initAutocomplete() {
                 // Create the autocomplete object, restricting the search to geographical
                 // location types.
                 autocomplete = new google.maps.places.Autocomplete(
                     /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                     {types: ['geocode']});

                 // When the user selects an address from the dropdown, populate the address
                 // fields in the form.
                         autocomplete.addListener('place_changed', fillInAddress);
                       }

                       function fillInAddress() {
                         // Get the place details from the autocomplete object.
                         var place = autocomplete.getPlace();

                         for (var component in componentForm) {
                           document.getElementById(component).value = '';
                           document.getElementById(component).disabled = false;
                         }

                         // Get each component of the address from the place details
                         // and fill the corresponding field on the form.
                         for (var i = 0; i < place.address_components.length; i++) {
                           var addressType = place.address_components[i].types[0];
                           if (componentForm[addressType]) {
                             var val = place.address_components[i][componentForm[addressType]];
                             document.getElementById(addressType).value = val;
                           }
                         }
                       }

                       // Bias the autocomplete object to the user's geographical location,
                       // as supplied by the browser's 'navigator.geolocation' object.
                       function geolocate() {
                         if (navigator.geolocation) {
                           navigator.geolocation.getCurrentPosition(function(position) {
                             var geolocation = {
                               lat: position.coords.latitude,
                               lng: position.coords.longitude
                             };
                             var circle = new google.maps.Circle({
                               center: geolocation,
                               radius: position.coords.accuracy
                             });
                             autocomplete.setBounds(circle.getBounds());
                           });
                         }
                       }
                     </script>

                     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&libraries=places&callback=initAutocomplete"
                         async defer></script>

                     <script src="../search/js/main.js"></script>
                   </body>
                 </html>
