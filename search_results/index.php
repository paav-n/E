<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Homes Template">
    <meta name="keywords" content="Homes, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homes Page | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
          rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<!-- Header Section Begin -->

<!-- Header Section End -->
<!-- Hero Section Begin -->
<section class="hero-section home-page set-bg" data-setbg="img/pinkpanther.jpg">
    <div class="container hero-text text-white">
        <h2>Explore Nearby</h2>
        <h1>Restaurants.</h1>
    </div>
</section>
<!-- Hero Section End -->
<!-- Filter Search Section Begin -->
<div class="filter-search">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <form class="filter-form" action="" method="POST">
                    <div class="location">
                        <p>Cuisine</p>
                        <select name="cuisine" class="filter-location">
                            <option <?php if($_POST&&$_POST['cuisine']=='any')echo"selected='selected'";?>
                                    value="any">Any Price</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='breakfast')echo"selected='selected'";?>
                                    value="breakfast">Breakfast</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='vegetarian')echo"selected='selected'";?>
                                    value="vegetarian">Vegetarian</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='italian')echo"selected='selected'";?>
                                    value="italian">Italian</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='bbq')echo"selected='selected'";?>
                                    value="bbq">BBQ</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='mediterranean')echo"selected='selected'";?>
                                    value="mediterranean">Mediterranean</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='asian')echo"selected='selected'";?>
                                    value="asian">Asian</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='treats')echo"selected='selected'";?>
                                    value="treats">Treats</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='gluten-free')echo"selected='selected'";?>
                                    value="gluten-free">Gluten Free</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='indian')echo"selected='selected'";?>
                                    value="indian">Indian</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='thai')echo"selected='selected'";?>
                                    value="thai">Thai</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='american')echo"selected='selected'";?>
                                    value="american">American</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='chinese')echo"selected='selected'";?>
                                    value="chinese">Chinese</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='sushi')echo"selected='selected'";?>
                                    value="sushi">Sushi</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='salads')echo"selected='selected'";?>
                                    value="salads">Salads</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='chicken')echo"selected='selected'";?>
                                    value="chicken">Chicken</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='middle eastern')echo"selected='selected'";?>
                                    value="middle eastern">Middle Eastern</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='vegan friendly')echo"selected='selected'";?>
                                    value="vegan friendly">Vegan Friendly</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='kosher')echo"selected='selected'";?>
                                    value="kosher">Kosher</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='greek')echo"selected='selected'";?>
                                    value="greek">Greek</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='healthy')echo"selected='selected'";?>
                                    value="healthy">Healthy</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='deli')echo"selected='selected'";?>
                                    value="deli">Deli</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='southern')echo"selected='selected'";?>
                                    value="southern">Southern</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='burgers')echo"selected='selected'";?>
                                    value="burgers">Burgers</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='halal')echo"selected='selected'";?>
                                    value="halal">Halal</option>
                            <option <?php if($_POST&&$_POST['cuisine']=='german')echo"selected='selected'";?>
                                    value="german">German</option>



                        </select>
                    </div>
                    <div class="search-type">
                        <p>Price</p>
                        <select class="filter-property" name="price">
                            <option <?php if($_POST&&$_POST['price']=='any')echo"selected='selected'";?>
                                    value="any">Any Price</option>
                            <option <?php if($_POST&&$_POST['price']=='mild')echo"selected='selected'";?>
                                    value="mild">$</option>
                            <option <?php if($_POST&&$_POST['price']=='medium')echo"selected='selected'";?>
                                    value="medium">$$</option>
                            <option <?php if($_POST&&$_POST['price']=='hot')echo"selected='selected'";?>
                                    value="hot">$$$</option>
                        </select>
                    </div>


                    <div class="search-type">
                        <p>Minimum Rating</p>
                        <select class="filter-property" name="rating">
                            <option <?php if($_POST&&$_POST['rating']=='1')echo"selected='selected'";?>
                                    value="1">Any Rating</option>
                            <option <?php if($_POST&&$_POST['rating']=='2')echo"selected='selected'";?>
                                    value="2">2 stars</option>
                            <option <?php if($_POST&&$_POST['rating']=='3')echo"selected='selected'";?>
                                    value="3">3 stars</option>
                            <option <?php if($_POST&&$_POST['rating']=='4')echo"selected='selected'";?>
                                    value="4">4 stars</option>
                            <option <?php if($_POST&&$_POST['rating']=='5')echo"selected='selected'";?>
                                    value="5">5 stars</option>

                        </select>
                    </div>
                    <div class="search-type">
                        <p>Maximum Distance</p>
                        <select class="filter-property" name="maxdistance">
                            <option <?php if($_POST&&$_POST['maxdistance']=='1000')echo"selected='selected'";?>
                                    value="1000">Any Distance</option>
                            <option <?php if($_POST&&$_POST['maxdistance']=='1')echo"selected='selected'";?>
                                    value="1">1 mile</option>
                            <option <?php if($_POST&&$_POST['maxdistance']=='5')echo"selected='selected'";?>
                                    value="5">5 miles</option>
                            <option <?php if($_POST&&$_POST['maxdistance']=='10')echo"selected='selected'";?>
                                    value="10">10 miles</option>
                            <option <?php if($_POST&&$_POST['maxdistance']=='25')echo"selected='selected'";?>
                                    value="25">25 miles</option>


                        </select>

                    </div>





                    <div class="search-btn">
                        <button type="submit"><i class="flaticon-search"></i>Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Filter Search Section End -->
<!-- Hotel Room Section Begin -->
<section class="hotel-rooms spad">
    <div class="container">
        <div class="row">
            <?php
            $host_name = 'db777190816.hosting-data.io';
            $database = 'db777190816';
            $user_name = 'dbo777190816';
            $password = 'Singhi1234!';
            $connect = mysqli_connect($host_name, $user_name, $password, $database);
            if (mysqli_connect_errno()) {
                $message = "what the fuck";
                echo "<script type='text/javascript'>alert('$message');</script>";
                die('<p>Failed to connect to MySQL: ' . mysqli_error() . '</p>');
            }
            mysqli_select_db($connect, $database);
            $results = "SELECT * FROM Venues ORDER BY rating";

            $w=mysqli_query($connect,$results);

            $destinations='';
            while($row = mysqli_fetch_array($w, MYSQLI_ASSOC)) {

                $destinations.=urlencode($row['address']);
                $destinations.='|';
            }
            $addressurl=urlencode($_GET['finaladdress']);
            $final='https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$addressurl.'&destinations='.$destinations.'&key=AIzaSyDwad8k-q1agOTmGer_TXCG4tMCIWn_Gho';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $final);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 3);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $resp_json= curl_exec($ch);
            $resp=json_decode($resp_json,true);
            class eateries{
                public $data;
                public $distance;
            }

            $newresults = "SELECT * FROM Venues ORDER BY rating";
            $new=mysqli_query($connect,$newresults);
            $eaterieswithdistances=array();
            $index=0;
            while($newrow = $new->fetch_array(MYSQLI_ASSOC)) {
                $temp=new eateries;
                $temp->data=$newrow;
                $temp->distance=$resp['rows'][0]['elements'][$index]['distance']['value'];
                if($temp->distance/1000*0.6214<25) {
                    array_push($eaterieswithdistances, $temp);
                }
                $index++;
            }
            $count_outputted=0;



            foreach($eaterieswithdistances as $value) {

                $tobedisplayed=true;

                if($_POST){
                    if(($_POST['cuisine']!='any')&&($_POST['cuisine']!=$value->data['cuisine'])){
                        $tobedisplayed=false;
                    }
                    if(($_POST['price']!='any')&&($_POST['price']!=$value->data['price'])){
                        $tobedisplayed=false;
                    }
                    if(($_POST['rating']!='any')&&(!((int)$value->data['rating']>=(int)$_POST['rating']))){
                        $tobedisplayed=false;
                    }
                    if(($_POST['maxdistance']!='any')&&!($value->distance*0.6214/1000<=$_POST['maxdistance'])){
                        $tobedisplayed=false;
                    }
                }


                if($tobedisplayed==true){
                    $count_outputted++;
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-items">
                            <?php
                            $string = str_replace(' ', '', $value->data['name']);
                            $a='img/';
                            $b='.jpg';
                            $file=$a.$string.$b;
                            ?>
                            <div class="room-img set-bg" data-setbg="<?php echo"$file";?>">
                            </div>
                            <div class="room-text">
                                <div class="room-details">
                                    <div class="room-title">
                                        <h5><?php echo ucwords($value->data['name']); ?></h5>
                                        <a href="#"><i class="flaticon-placeholder"></i> <span>Distance</span></a>
                                        <p><?php echo intval($value->distance*0.6214/1000),' miles away'; ?></p>
                                        <a target="blank" href="map.php?address=<?php echo $value->data['address'];?>'"><i class="flaticon-cursor"></i> <span>Show on Map</span></a>


                                    </div>

                                </div>
                                <div class="room-features">
                                    <div class="room-info">
                                        <div class="size">
                                            <p>Cuisine</p>

                                            <span><?php echo ucwords($value->data['cuisine']); ?></span>
                                            <br>
                                        </div>
                                        <div class="beds">
                                            <p>Price</p>
                                            <span>
                                                    <?php
                                                    if(ucwords($value->data['price'])=='Mild'){
                                                        echo "$";

                                                    }
                                                    else if(ucwords($value->data['price'])=='Medium'){
                                                        echo"$$";
                                                    }
                                                    else{
                                                        echo"$$$";
                                                    }
                                                    ?>
                                                    </span>
                                        </div>
                                        <div class="beds">
                                            <p>Rating</p>
                                            <?php
                                            if(($value->data['rating'])=='1'){
                                                echo "<img src=\"img/onestar.png\" alt=\"\">";

                                            }
                                            else if(($value->data['rating'])=='2'){
                                                echo "<img src=\"img/twostar.png\" alt=\"\">";
                                            }
                                            else if(($value->data['rating'])=='3'){
                                                echo "<img src=\"img/threestar.png\" alt=\"\">";
                                            }
                                            else if(($value->data['rating'])=='4'){
                                                echo "<img src=\"img/fourstar.png\" alt=\"\">";
                                            }
                                            else{
                                                echo "<img src=\"img/fivestar.png\" alt=\"\">";
                                            }
                                            ?>
                                        </div>
                                        <div class="room-price">
                                            <br>
                                            <a href="../menu/index.php?name=<?php echo $value->data['name']?>" class="site-btn btn-line">View Menu</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            }?>
        </div>
    </div>
    <h4 class="search-result">
        <?php if($count_outputted==0){
            echo "No results found. Please try a different search combination.";
        }?>
    </h4>
</section>
<!-- Hotel Room Section End -->
<!-- Popular Room Section Begin -->

<!-- Popular Room Section End -->
<!-- Newslatter Section Begin -->
<!-- Newslatter Section End -->
<!-- Servies Section Begin -->
<section class="services-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-side">
                    <h2><span>Why choose Enthalpy?</span><br>Because we we are the best in <br>the business.</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id est nec nisl tristique
                        dignissim semper sed diam. Donec vulputate neque in massa hendrerit, non dignissim ipsum
                        varius. Mauris dignissim libero ipsum, nec molestie nulla molestie at. Nam imperdiet
                        hendrerit finibus. Sed porttitor ultricies sagittis. Nullam lobortis nec quam vitae
                        venenatis. </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-side">
                    <ul>
                        <li><img src="img/check.png" alt="">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </li>
                        <li><img src="img/check.png" alt="">Praesent tincidunt diam in ante faucibus tristique.</li>
                        <li><img src="img/check.png" alt="">Vivamus id nisl sed mi varius lobortis.</li>
                        <li><img src="img/check.png" alt="">Suspendisse sit amet erat placerat, molestie neque id
                        </li>
                        <li><img src="img/check.png" alt="">Fusce pretium libero sit amet ipsum posuere pretium.
                        </li>
                        <li><img src="img/check.png" alt="">Praesent tincidunt diam in ante faucibus tristique.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Servies Section End -->

<div class="row p-20">
    <div class="col-lg-12 text-center">
        <div class="copyright">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

        </div>
    </div>
</div>
</div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/main.js"></script>
</body>

</html>