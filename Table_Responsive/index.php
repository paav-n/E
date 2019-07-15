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
    <title>Order Table</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../img/Polaxicon.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
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
                $results;
                if($_SESSION['Role']=='admin') {
                    $results="SELECT * FROM orders ORDER BY OrderId DESC";
                }
                if($_SESSION['Role']=='vendor') {
                    $results="SELECT * FROM orders WHERE Venue='$_SESSION[business_name]' ORDER BY OrderId DESC";
                }
                if($_SESSION['Role']=='maestro') {
                    $results="SELECT * FROM orders WHERE ByMaestro= '1' ORDER BY OrderId DESC";
                }
                $w=mysqli_query($connect,$results);
                $Pending=array();
                $Accepted=array();
                $Rejected=array();
                while($row = $w->fetch_array(MYSQLI_ASSOC)) {
                    if($row['status']=='Pending'){
                        array_push($Pending,$row);
                    }
                    else if($row['status']=='Accepted'){
                        array_push($Accepted,$row);
                    }
                    else{
                        array_push($Rejected,$row);
                    }
                }?>
                <h1>Pending Orders</h1><br>
                <?php
                foreach($Pending as $row){
                    ?>
                    <div class="row mb-5">
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
                                <th class="column9">Status</th>
                                <th class="column10">Delivery Method</th>
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
                                <td class="column9"><?php echo $row['status'];?></td>
                                <td class="column10"><?php echo ($row['ByMaestro']==1?"Maestro":"Venue");?></td>
                            </tr>
                            <tr>

                                <th class="column2">Name</th>
                                <th class="column3">Price</th>
                            </tr>
                            <?php
                            $items = explode(",", $row['FullOrder']);
                            foreach ($items as $itemID) {
                                $itemsql;
                                if($_SESSION['ROLE']=='vendor') {
                                    $itemsql = "SELECT * FROM {$_SESSION['business_name']} WHERE ITEM_ID='{$itemID}';";
                                }
                                else{
                                    $itemsql = "SELECT * FROM Manhattan_Bagel WHERE ITEM_ID='{$itemID}';";
                                }
                                $x=mysqli_query($connect,$itemsql);
                                $itemrow = $x->fetch_array(MYSQLI_ASSOC) ?>
                                <tr>
                                    <td class="column1"><?php echo $itemrow['ITEM_NAME']?></td>
                                    <td class="column2"><?php echo $itemrow['ITEM_PRICE']?></td>
                                </tr>
                                <?php
                            }
                            $url='http://enthalpylogistics.com/Table_Responsive/accept_handler.php?orderid='.$row['OrderId'];
                            $url2='http://enthalpylogistics.com/Table_Responsive/reject_handler.php?orderid='.$row['OrderId'];
                            if($_SESSION['Role']=='vendor' && $row['status']=='Pending') { ?>
                                <button onclick="window.location.href = '<?php echo $url;?>';">
                                    Accept</button>
                                <button onclick="window.location.href = '<?php echo $url2;?>';">
                                    Reject</button>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <?php


                }?>
                <h1>Accepted Orders</h1><br>
                <?php
                foreach($Accepted as $row){ ?>
                    <div class="row mb-5">
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
                                <th class="column9">Status</th>
                                <th class="column10">Delivery Method</th>
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
                                <td class="column9"><?php echo $row['status'];?></td>
                                <td class="column10"><?php echo ($row['ByMaestro']==1?"Maestro":"Venue");?></td>
                            </tr>
                            <tr>

                                <th class="column2">Name</th>
                                <th class="column3">Price</th>
                            </tr>
                            <?php
                            $items = explode(",", $row['FullOrder']);
                            foreach ($items as $itemID) {
                                $itemsql;
                                if($_SESSION['ROLE']=='vendor') {
                                    $itemsql = "SELECT * FROM {$_SESSION['business_name']} WHERE ITEM_ID='{$itemID}';";
                                }
                                else{
                                    $itemsql = "SELECT * FROM Manhattan_Bagel WHERE ITEM_ID='{$itemID}';";
                                }
                                $x=mysqli_query($connect,$itemsql);
                                $itemrow = $x->fetch_array(MYSQLI_ASSOC) ?>
                                <tr>
                                    <td class="column1"><?php echo $itemrow['ITEM_NAME']?></td>
                                    <td class="column2"><?php echo $itemrow['ITEM_PRICE']?></td>
                                </tr>
                                <?php
                            }
                            $url='http://enthalpylogistics.com/Table_Responsive/accept_handler.php?orderid='.$row['OrderId'];
                            $url2='http://enthalpylogistics.com/Table_Responsive/reject_handler.php?orderid='.$row['OrderId'];
                            if($_SESSION['Role']=='vendor' && $row['status']=='Pending') { ?>
                                <button onclick="window.location.href = '<?php echo $url;?>';">
                                    Accept</button>
                                <button onclick="window.location.href = '<?php echo $url2;?>';">
                                    Reject</button>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <?php


                }?>
                <h1>Rejected Orders</h1><br>
                <?php
                foreach($Rejected as $row){ ?>
                    <div class="row mb-5">
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
                                <th class="column9">Status</th>
                                <th class="column10">Delivery Method</th>
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
                                <td class="column9"><?php echo $row['status'];?></td>
                                <td class="column10"><?php echo ($row['ByMaestro']==1?"Maestro":"Venue");?></td>
                            </tr>
                            <tr>

                                <th class="column2">Name</th>
                                <th class="column3">Price</th>
                            </tr>
                            <?php
                            $items = explode(",", $row['FullOrder']);
                            foreach ($items as $itemID) {
                                $itemsql;
                                if($_SESSION['ROLE']=='vendor') {
                                    $itemsql = "SELECT * FROM {$_SESSION['business_name']} WHERE ITEM_ID='{$itemID}';";
                                }
                                else{
                                    $itemsql = "SELECT * FROM Manhattan_Bagel WHERE ITEM_ID='{$itemID}';";
                                }
                                $x=mysqli_query($connect,$itemsql);
                                $itemrow = $x->fetch_array(MYSQLI_ASSOC) ?>
                                <tr>
                                    <td class="column1"><?php echo $itemrow['ITEM_NAME']?></td>
                                    <td class="column2"><?php echo $itemrow['ITEM_PRICE']?></td>
                                </tr>
                                <?php
                            }
                            $url='http://enthalpylogistics.com/Table_Responsive/accept_handler.php?orderid='.$row['OrderId'];
                            $url2='http://enthalpylogistics.com/Table_Responsive/reject_handler.php?orderid='.$row['OrderId'];
                            if($_SESSION['Role']=='vendor' && $row['status']=='Pending') { ?>
                                <button onclick="window.location.href = '<?php echo $url;?>';">
                                    Accept</button>
                                <button onclick="window.location.href = '<?php echo $url2;?>';">
                                    Reject</button>
                                <?php
                            }
                            ?>
                        </table>
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
