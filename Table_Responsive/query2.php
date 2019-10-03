<?php
$host_name = 'db777190816.hosting-data.io';
$database = 'db777190816';
$user_name = 'dbo777190816';
$password = 'Singhi1234!';
$first_id=$_POST['id1'];
$second_id=$_POST['id2'];
$first_id=1;
$second_id=9;

$connect = mysqli_connect($host_name, $user_name, $password, $database);

if (mysqli_connect_errno()) {
    die('<p>Failed to connect to MySQL: '.mysqli_error().'</p>');
}

mysqli_select_db($connect, $database);

$first_result="SELECT * FROM orders WHERE OrderId=$first_id";
$first=mysqli_query($connect,$first_result);
$row1 = $first->fetch_array(MYSQLI_ASSOC);

if($row1['status']=='Accepted By Maestro'){
    echo "<h1>Sorry, somebody else confirmed this order before you</h1>";
    die();
}

$second_result="SELECT * FROM orders WHERE OrderId=$second_id";
$second=mysqli_query($connect,$second_result);
$row2 = $second->fetch_array(MYSQLI_ASSOC);

if($row2['status']=='Accepted By Maestro'){
    echo "<h1>Sorry, somebody else confirmed this order before you</h1>";
    die();
}

$date_1=strtotime($row1['deliverytime']);
$date_2=strtotime($row2['deliverytime']);

$inter = $date_2 - $date_1;
$minutes_diff = $inter/ 60;


$address1=$row1['Address'];
$datetime1=$row1['deliverytime'];
$datetest1="";
$i1 =0;

while($datetime1[$i1]!=' '){
    $datetest1.=$datetime1[$i1];
    $i1++;
}

$results1="SELECT * FROM orders WHERE (Date(deliverytime)='$datetest1' and status='Accepted' and OrderId!=$first_id)";
$t1=mysqli_query($connect,$results1);
$destinations1='';
$intermediate1=array();

while($row = mysqli_fetch_array($t1, MYSQLI_ASSOC)) {
    $destinations1.=urlencode($row1['Address']);
    $destinations1.='|';
}

$addressurl1=urlencode($address1);
$final1='https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$addressurl.'&destinations='.$destinations.'&key=AIzaSyCON3axt0wBu2DVDlQvyBsUI8cvPq8rIkE';
$ch1 = curl_init();
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $final);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 3);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
$resp_json1= curl_exec($ch1);
$resp1=json_decode($resp_json1,true);

class eateries{
    public $data;
    public $distance;
}

$newresults1 ="SELECT * FROM orders WHERE (Date(deliverytime)='$datetest1' and status='Accepted'and OrderId!=$first_id)";
$new1=mysqli_query($connect,$newresults1);
$eaterieswithdistances=array();
$index1=0;


while($newrow = $new1->fetch_array(MYSQLI_ASSOC)) {
    $temp=new eateries;
    $temp->data=$newrow;
    $temp->distance=$resp1['rows'][0]['elements'][$index1]['duration']['value'];
    $index++;
    $query="Select deliverytime FROM orders where OrderId=$newrow[OrderId]";
    $n=mysqli_query($connect,$query);
    $time = mysqli_fetch_array($n, MYSQLI_ASSOC);
    $date1 = strtotime($datetime);
    $date2 = strtotime($time['deliverytime']);
    $interval = $date2 - $date1;
    $minutes = $interval / 60;
    $window=$minutes-(int)$temp->distance/60;

    if($minutes_diff>0) {
        if($minutes<0 && abs($window)<60 && $window>0) array_push($eaterieswithdistances, $temp->data['OrderId']);
    }
    else{
        if($minutes>0 && abs($window)<60 && $window>0) array_push($eaterieswithdistances, $temp->data['OrderId']);
    }
    $index1++;

}



$address2=$row2['Address'];
$datetime2=$row2['deliverytime'];
$datetest2="";
$i2 =0;
while($datetime2[$i2]!=' '){
    $datetest2.=$datetime2[$i2];
    $i2++;
}
$results2="SELECT * FROM orders WHERE (Date(deliverytime)='$datetest2' and status='Accepted' and (OrderId!=$second_id or OrderId!=$first_id))";
$t2=mysqli_query($connect,$results2);
$destinations2='';
$intermediate2=array();

while($row2 = mysqli_fetch_array($t2, MYSQLI_ASSOC)) {
    $destinations2.=urlencode($row2['Address']);
    $destinations2.='|';
}

$addressurl2=urlencode($address2);
$final2='https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$addressurl2.'&destinations='.$destinations2.'&key=AIzaSyCON3axt0wBu2DVDlQvyBsUI8cvPq8rIkE';

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch2, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_URL, $final2);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 3);
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
$resp_json2= curl_exec($ch2);
$resp2=json_decode($resp_json2,true);

$newresults2 ="SELECT * FROM orders WHERE (Date(deliverytime)='$datetest2' and status='Accepted'and (OrderId!=$second_id or OrderId!=
    $first_id))";
$new2=mysqli_query($connect,$newresults2);
$index2=0;


while($newrow2 = $new2->fetch_array(MYSQLI_ASSOC)) {
    $temp=new eateries;
    $temp->data=$newrow2;
    $temp->distance=$resp2['rows'][0]['elements'][$index2]['duration']['value'];
    $query="Select deliverytime FROM orders where OrderId=$newrow2[OrderId]";
    $n=mysqli_query($connect,$query);
    $time = mysqli_fetch_array($n, MYSQLI_ASSOC);
    $date1 = strtotime($datetime2);
    $date2 = strtotime($time['deliverytime']);
    $interval = $date2 - $date1;
    $minutes = $interval / 60;
    $window=$minutes-(int)$temp->distance/60;

    if($minutes_diff>0) {
        if($window>0 && abs($window)<60 && $minutes>0) array_push($eaterieswithdistances, $temp->data['OrderId']);
    }
    else{
        if($minutes<0 && abs($window)<60 && $window>0) array_push($eaterieswithdistances, $temp->data['OrderId']);
    }
    $index2++;
}

echo json_encode($eaterieswithdistances);
?>