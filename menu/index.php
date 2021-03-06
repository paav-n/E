<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Menu</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Bungee&display=swap" rel="stylesheet">
    <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="fonts/ionicons.css" rel="stylesheet">
    <link href="common/styles.css" rel="stylesheet">

</head>

<script>
    var items=new Array();
</script>

<body>

<header>


    <form action="" method="get" id="form1">
        <input type="hidden" id="items" name="items" value=""><br>
        <input type="hidden" name="venue_id" value="5"><br>
    </form>
    <button class="checkout" onclick="checkout()" type="submit" form="form1" value="Submit">Checkout</button>
    <script type="text/javascript">
        function checkout(){
            document.getElementById("items").value = JSON.stringify(items);
            alert(document.getElementById("items").value);
        }

    </script>



</header>

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

$it = $_GET["name"];
$venue = str_replace(" ", "_", $it);
$results="SELECT * from $venue";
$w=mysqli_query($connect,$results);

?>

<section>
    <div class="container">
        <div class="heading">
            <br><br>
            <h2>Menu</h2>
        </div>
        <?php
        $results2="SELECT * from $venue";
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
            <?php $results3="SELECT * from $venue";
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
                    <button onclick="push<?php echo $row[ITEM_ID];?>()">Add To Cart</button>
                    <script type="text/javascript">
                        function push<?php echo $row[ITEM_ID];?>(){
                            items.push(<?php echo $row[ITEM_ID];?>);
                            alert("<?php echo $row[ITEM_NAME]?> was added to your cart");
                        }
                    </script>
                </div><!-- food-menu -->

            <?php } ?>
        </div><!-- row -->
    </div><!-- container -->
</section>

<footer class="pb-50  pt-70 pos-relative">

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