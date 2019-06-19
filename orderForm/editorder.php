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
      $ordernum=$_POST['order'];
      $results = "SELECT * FROM orders WHERE OrderId='{$ordernum}';";
      $w=mysqli_query($connect,$results);

    ?>
    <div class="site-wrap">
    <form action="editexec.php" method="post">
    <header class='site-header bg-light'>
    <div class='btn-toolbar pull-right'>
      <div class='btn-group'>
        <input type="submit" class="btn btn-primary mr-4" value="Submit Changes">
      </div>
    </div>
    <div class="row align-items-center">
    <h1>Edit Order <?php echo $ordernum ?></h1>
    </div>

  </header>
  <div class="main-wrap">

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
         <div class="col-md-6 justify-content-center">
           <h2> Order Information</h2>
             <div class="form-group">
               <input type="hidden" name="total" value='<?php echo $taxedtotal ?>'>
               <label for="headcount" class="label">Headcount</label>
                 <div class="form-field-icon-wrap">
                   <select name="headcount"  class="form-control" id="headcount">
                     <option disabled selected value=""> -- select an option -- </option>
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
                          <option disabled selected value=""> -- select an option -- </option>
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
             </div>
     <div class="row ml-5">
       <div class="col-md-4"><strong>Name</strong></div>
       <div class="col-md-4"><strong>Price</strong></div>
     </div>
     <?php
     $items = explode(",", $row['FullOrder']);
     foreach ($items as $itemID) {
       $itemsql = "SELECT * FROM Item WHERE ITEM_ID= '{$itemID}';";
       $x=mysqli_query($connect,$itemsql);
       $itemrow = $x->fetch_array(MYSQLI_ASSOC) ?>
       <div class="row ml-5">
       <div class="col-md-4"><?php echo $itemrow['ITEM_NAME']?></div>
       <div class="col-md-4"><?php echo $itemrow['ITEM_PRICE']?></div>
       <div class="col-md-4"><input type="checkbox" class="btn" id="delete" name="delete" value="<?php echo $itemrow['ITEM_ID']?>"></div>
       </div>
       <?php
     }
     ?>
     <div class="row ml-3">
     <input type="hidden" name="order" value=<?php echo $row['OrderId']?>>
     </div>
     </div>
      <?php } ?>
      <h1>Add an item</h1>
      <h2 class="ml-3">Breakfast for the Bunch</h2>
      <?php
      $sql = "SELECT * FROM Item ORDER BY ITEM_SECTION";
      $z=mysqli_query($connect,$sql);
                          while(($irow = $z->fetch_array(MYSQLI_ASSOC)) && $irow['ITEM_SECTION']==1) {
                              ?>
                              <div class="row ml-3 mb-5">
                                  <div class="col-sm-3"><b><?php echo $irow['ITEM_NAME']?></b></div>
                                  <div class="col-sm-4"><?php echo $irow['ITEM_DESCRIPTION']?></div>
                                  <div class="col-sm-3"><i><?php echo $irow['ITEM_PRICE']?></i></div>
                                  <div class="col-sm-2">
                                    <input type="checkbox" class="btn" name="add" id="add" value="<?php echo $irow['ITEM_ID']?>">
                                  </div>
                              </div>
                              <?php
                          }
                          ?>
      <?php if($irow['ITEM_SECTION']==2){?>
      <div class="limiter" id="lunch-for-the-bunch">
      <h2 class="ml-3">Lunch for the Bunch</h2>
      <?php
                          do{
                              ?>
                              <div class="row ml-3 mb-5">
                                  <div class="col-sm-3"><b><?php echo $irow['ITEM_NAME']?></b></div>
                                  <div class="col-sm-4"><?php echo $irow['ITEM_DESCRIPTION']?></div>
                                  <div class="col-sm-3"><i><?php echo $irow['ITEM_PRICE']?></i></div>
                                  <div class="col-sm-2">
                                      <input type="checkbox" class="btn" name="add" id="add" value="<?php echo $irow['ITEM_ID']?>">
                                  </div>
                              </div>

                              <?php
                          } while(($irow = $z->fetch_array(MYSQLI_ASSOC)) && $irow['ITEM_SECTION']==2);
                          ?>
      <?php }?>
      </div>

      <?php if($irow['ITEM_SECTION']==3){?>
      <div class="limiter" id="value-paks">
      <h2 class="ml-3">Value Paks</h2>
      <?php
                          do{
                              ?>
                              <div class="row ml-3 mb-5">
                                  <div class="col-sm-3"><b><?php echo $irow['ITEM_NAME']?></b></div>
                                  <div class="col-sm-4"><?php echo $irow['ITEM_DESCRIPTION']?></div>
                                  <div class="col-sm-3"><i><?php echo $irow['ITEM_PRICE']?></i></div>
                                  <div class="col-sm-2">
                                    <input type="checkbox" class="btn" name="add" id="add" value="<?php echo $irow['ITEM_ID']?>">
                                  </div>
                                </div>
                              <?php
                          } while(($irow = $z->fetch_array(MYSQLI_ASSOC)) && $irow['ITEM_SECTION']==3);
                          ?>
      <?php }?>
      </div>

      <?php if($irow['ITEM_SECTION']==4){?>
      <div class="limiter" id="lunch-for-one">
      <h2 class="ml-3">Lunch for One</h2>
      <?php
                          do{
                              ?>
                              <div class="row ml-3 mb-5">
                                  <div class="col-sm-3"><b><?php echo $irow['ITEM_NAME']?></b></div>
                                  <div class="col-sm-4"><?php echo $irow['ITEM_DESCRIPTION']?></div>
                                  <div class="col-sm-3"><i><?php echo $irow['ITEM_PRICE']?></i></div>
                                  <div class="col-sm-2">
                                    <input type="checkbox" class="btn" name="add" id="add" value="<?php echo $irow['ITEM_ID']?>">
                                  </div>
                              </div>
                              <?php
                          } while(($irow = $z->fetch_array(MYSQLI_ASSOC)) && $irow['ITEM_SECTION']==4);}
                          ?>
      </div>

      <?php if($irow['ITEM_SECTION']==5){?>
      <div class="limiter" id="salads-for-one">
      <h2 class="ml-3">Box'd Salads for One</h2>
      <?php
                          do{
                              ?>
                              <div class="row ml-3 mb-5">
                                  <div class="col-sm-3"><b><?php echo $irow['ITEM_NAME']?></b></div>
                                  <div class="col-sm-6"><?php echo $irow['ITEM_DESCRIPTION']?></div>
                                  <div class="col-sm-3"><i><?php echo $irow['ITEM_PRICE']?></i></div>
                                  <div class="col-sm-2">
                                    <input type="checkbox" class="btn" name="add" id="add" value="<?php echo $irow['ITEM_ID']?>">
                                  </div>
                             </div>
                              <?php
                          } while(($irow = $z->fetch_array(MYSQLI_ASSOC)) && $irow['ITEM_SECTION']==5);
                          }?>
      </div>

      <?php if($irow['ITEM_SECTION']==6){?>
      <div class="limiter" id="beverages">
      <h2 class="ml-3">Beverages</h2>
      <?php
                          do{
                              ?>
                              <div class="row ml-3 mb-5">
                                  <div class="col-sm-3"><b><?php echo $irow['ITEM_NAME']?></b></div>
                                  <div class="col-sm-4"><?php echo $irow['ITEM_DESCRIPTION']?></div>
                                  <div class="col-sm-3"><i><?php echo $irow['ITEM_PRICE']?></i></div>
                                  <div class="col-sm-2">
                                    <input type="checkbox" class="btn" name="add" id="add" value="<?php echo $irow['ITEM_ID']?>">
                                  </div>
                              </div>
                              <?php
                          } while(($irow = $z->fetch_array(MYSQLI_ASSOC)) && $irow['ITEM_SECTION']==6);}?>
      </div>
</div>
</form>
</div>
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
