<?php
ob_start();
session_start();
session_set_cookie_params(0,"/E");
$status= $_SESSION["Logged"];
if(!$status){
    echo"Not Logged In<br>";
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
    <link href="https://fonts.googleapis.com/css?family=Bungee&display=swap" rel="stylesheet">
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
                $result;
                $result="SELECT * FROM orders WHERE OrderId=$_GET[orderid]";
                $w=mysqli_query($connect,$result);
              	$row = $w->fetch_array(MYSQLI_ASSOC);
              	$address=$row['Address'];
              	$datetime=$row['deliverytime'];
              	$datetest=date("Y-m-d", strtotime($row["deliverytime"]));
              	$results="SELECT * FROM orders WHERE (Date(deliverytime)='$datetest' and status='Accepted' and OrderId!=$_GET[orderid])";        
              	$t=mysqli_query($connect,$results);
              $destinations='';
              $intermediate=array();
              while($row = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
                  $destinations.=urlencode($row['Address']);
                  $destinations.='|';
              }
              $addressurl=urlencode($address);
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
              $newresults ="SELECT * FROM orders WHERE (Date(deliverytime)='$datetest' and status='Accepted'and OrderId!=$_GET[orderid])";
              $new=mysqli_query($connect,$newresults);
              $eaterieswithdistances=array();
              $index=0;
              $count_outputted=0;
              while($newrow = $new->fetch_array(MYSQLI_ASSOC)) {
                  $temp=new eateries;
                  $temp->data=$newrow;
                  $temp->distance=$resp['rows'][0]['elements'][$index]['duration']['value'];
                  $query="Select TIMEDIFF(deliverytime,$datetime) where OrderId=$newrow[OrderId]";
                $n=mysqli_query($connect,$query);
                $time = mysqli_fetch_array($n, MYSQLI_NUM);
                $minutes= date('i', strtotime($time[0]));
                if(abs($minutes-$temp->distance)<25){
                  $count_outputted++;
                  array_push($eaterieswithdistances,$temp);
                  $index++;
                }
              }
              $url='http://enthalpylogistics.com/Table_Responsive/ContactFrom_v4/maestro_accept_handler.php?orderid='.$_GET['orderid'];
              if($count_outputted==0){
                echo "Redirect";
                header('Location: '.$url);
                 die();
              }

                $Pending=array();
                $Accepted=array();
                if($_SESSION['Role']=='maestro') {?>
                    <h1>Do You Want To Add One of These Orders</h1><br>
                    <?php
                    foreach($eaterieswithdistances as $row){
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
                                    <th class="column11">Maestro</th>
                                </tr>
                                <tr>
                                    <td class="column1"><?php echo $row->data['OrderId']?></td>
                                    <td class="column2"><?php echo $row->data['Date']?></td>
                                    <td class="column3"><?php echo $row->data['Name']?></td>
                                    <td class="column4"><?php echo $row->data['Email']?></td>
                                    <td class="column5"><?php echo $row->data['Address']?></td>
                                    <td class="column6"><?php echo $row->data['Headcount']?></td>
                                    <td class="column7"><?php echo $row->data['deliverytime']?></td>
                                    <td class="column8"><?php echo $row->data['Total']?></td>
                                    <td class="column9"><?php echo $row->data['status'];?></td>
                                    <td class="column10"><?php if($row->data['ByMaestro']==1){
                                            echo"Maestro";}
                                        else if($row->data['ByMaestro']===NULL){ echo $row->data['ByMaestro'];}
                                        else{
                                            echo "Venue";}?></td>
                                    <td class="column11"><?php if($row->data['Maestro']==NULL){
                                            echo"Awaiting Maestro";}
                                        ?></td>
                                </tr>
                                <tr>

                                    <th class="column2">Name</th>
                                    <th class="column3">Price</th>
                                </tr>
                                <?php
                                $items = explode(",", $row->data['FullOrder']);
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
                      			
                                $url='http://enthalpylogistics.com/Table_Responsive/ContactFrom_v4/maestro_accept_handler.php?batch=1&orderid='.$_GET['orderid'].'&secondorderid='.$row->data['OrderId'];
                                $url2='http://enthalpylogistics.com/Table_Responsive/ContactFrom_v4/reject_handler.php?orderid='.$_GET['orderid'];
                                if($_SESSION['Role']=='maestro' && $row->data['status']!='Accepted By Maestro') { ?>
                                    <button onclick="window.location.href = '<?php echo $url;?>';">
                                        Add Order</button>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <?php

                    }
                }?>
                
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

