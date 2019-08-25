<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Manhattan Bagel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

    <!-- Stylesheets -->
    <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="fonts/ionicons.css" rel="stylesheet">
    <link href="common/styles.css" rel="stylesheet">

</head>
<body>

<header>
    <div class="container">
        <a class="logo" href="#"><img src="images/logo-white.png" alt="Logo"></a>

        <div class="right-area">
            <h6><a class="plr-20 color-white btn-fill-primary" href="#">ORDER: +34 685 778 8892</a></h6>
        </div><!-- right-area -->

        <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

        <ul class="main-menu font-mountainsre" id="main-menu">
            <li><a href="index.html">HOME</a></li>
            <li><a href="02_about_us.html">ABOUT US</a></li>
            <li><a href="03_menu.html">SERVICES</a></li>
            <li><a href="04_blog.html">NEWS</a></li>
            <li><a href="05_contact.html">CONTACT</a></li>
        </ul>

        <div class="clearfix"></div>
    </div><!-- container -->
</header>


<section class="bg-1 h-900x main-slider pos-relative">
    <div class="triangle-up pos-bottom"></div>
    <div class="container h-100">
        <div class="dplay-tbl">
            <div class="dplay-tbl-cell center-text color-white">

                <h5><b>BEST IN TOWN</b></h5>
                <h1 class="mt-30 mb-15">Pizza & Pasta</h1>
                <h5><a href="#" class="btn-primaryc plr-25"><b>SEE TODAYS MENU</b></a></h5>
            </div><!-- dplay-tbl-cell -->
        </div><!-- dplay-tbl -->
    </div><!-- container -->
</section>

<?php
session_start();
?>
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
$results="SELECT * from Manhattan_Bagel";
$w=mysqli_query($connect,$results);

?>

<section class="story-area bg-seller color-white pos-relative">
    <div class="pos-bottom triangle-up"></div>
    <div class="pos-top triangle-bottom"></div>
    <div class="container">
        <div class="heading">
            <img class="heading-img" src="images/heading_logo.png" alt="">
            <h2>Best Sellers</h2>
        </div>

        <div class="row">
            <?php
            for( $i=0;$i<8;$i++){
                $row = $w->fetch_array(MYSQLI_ASSOC);
                ?>
                <div class="col-lg-3 col-md-4  col-sm-6 ">
                    <div class="center-text mb-30">
                        <h5 class="mt-20"><?php echo $row['ITEM_NAME'];?></h5>
                        <h4 class="mt-5"><b><?php echo $row['ITEM_PRICE'];?></b></h4>
                        <h6 class="mt-20"><a href="#" class="btn-brdr-primary plr-25"><b>Add To Cart</b></a></h6>
                    </div><!--text-center-->
                </div><!-- col-md-3 -->

                <?php
            }
            ?>
        </div><!-- row -->

        <h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="#" class="btn-primaryc plr-25"><b>SEE TODAYS MENU</b></a></h6>
    </div><!-- container -->
</section>


<section>
    <div class="container">
        <div class="heading">
            <img class="heading-img" src="images/heading_logo.png" alt="">
            <h2>Menu</h2>
        </div>
        <?php
        $results2="SELECT * from Manhattan_Bagel";
        $t=mysqli_query($connect,$results2);
        $categories=array();
        while($row = $t->fetch_array(MYSQLI_ASSOC)) {
            $add=true;
            foreach ($categories as $item){
                if($row[ITEM_SECTION2]==$item){
                    $add=false;
                }
            }
            if($add==true){
                array_push($categories,$row[ITEM_SECTION2]);
            }
        }
        ?>
        <div class="row">
            <div class="col-sm-12">
                <ul class="selecton brdr-b-primary mb-70">
                    <li><a class="active" href="#" data-select="*"><b>ALL</b></a></li>
                    <?php foreach($categories as $it){
                        $it=str_replace(' ','',$it);?>

                        <li><a href="#" data-select="<?php echo $it;?>"><b>
                                    <?php $it=str_replace(' ','',$it);echo $it;?></b></a></li>
                    <?php }?>
                </ul>
            </div><!--col-sm-12-->
        </div><!--row-->

        <div class="row">
            <?php $results3="SELECT * from Manhattan_Bagel";
            $s=mysqli_query($connect,$results3);
            while($row = $s->fetch_array(MYSQLI_ASSOC)) {
                ?>
                <div class="col-md-6 food-menu <?php $ech=str_replace(' ', '',$row[ITEM_SECTION2]);echo $ech;?>">

                    <div class="sided-90x mb-30 ">
                        <div class="s-right">
                            <h5 class="mb-10"><b><?php echo $row['ITEM_NAME'];?></b><b class="color-primary float-right"><?php echo $row['ITEM_PRICE'];?></b></h5>
                            <p class="pr-70"><?php echo $row['ITEM_DESCRIPTION'];?></p>
                        </div><!--s-right-->
                    </div><!-- sided-90x -->
                </div><!-- food-menu -->

            <?php } ?>
            <div class="col-md-6 food-menu test">

                <div class="sided-90x mb-30 ">
                    <div class="s-right">
                        <h5 class="mb-10"><b><?php echo "Test";?></b><b class="color-primary float-right"><?php echo "test";?></b></h5>
                        <p class="pr-70"><?php echo "test";?></p>
                    </div><!--s-right-->
                </div><!-- sided-90x -->
            </div>
        </div><!-- row -->

        <h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="#" class="btn-primaryc plr-25"><b>SEE TODAYS MENU</b></a></h6>
    </div><!-- container -->
</section>

<footer class="pb-50  pt-70 pos-relative">
    <div class="pos-top triangle-bottom"></div>
    <div class="container-fluid">
        <a href="index.html"><img src="images/logo-white.png" alt="Logo"></a>

        <div class="pt-30">
            <p class="underline-secondary"><b>Address:</b></p>
            <p>481 Creekside Lane Avila Beach, CA 93424 </p>
        </div>

        <div class="pt-30">
            <p class="underline-secondary mb-10"><b>Phone:</b></p>
            <a href="tel:+53 345 7953 32453 ">+53 345 7953 32453 </a>
        </div>

        <div class="pt-30">
            <p class="underline-secondary mb-10"><b>Email:</b></p>
            <a href="mailto:yourmail@gmail.com"> yourmail@gmail.com</a>
        </div>

        <ul class="icon mt-30">
            <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
            <li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
            <li><a href="#"><i class="ion-social-vimeo"></i></a></li>
        </ul>

        <p class="color-light font-9 mt-50 mt-sm-30"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
    </div><!-- container -->
</footer>

<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>

</body>
</html>