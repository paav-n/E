<?php
$host_name = 'db777190816.hosting-data.io';
$database = 'db777190816';
$user_name = 'dbo777190816';
$password = 'Singhi1234!';
$oid=1;
$connect = mysqli_connect($host_name, $user_name, $password, $database);

if (mysqli_connect_errno()) {
    die('<p>Failed to connect to MySQL: '.mysqli_error().'</p>');
}

mysqli_select_db($connect, $database);
$result;
$result="SELECT * FROM orders WHERE OrderId=$oid";
$w=mysqli_query($connect,$result);
$row = $w->fetch_array(MYSQLI_ASSOC);
if($row['status']=='Accepted By Maestro'){
    echo "<h1>Sorry, somebody else confirmed this order before you</h1>";
}

else{
    $address=$row['Address'];
    $datetime=$row['deliverytime'];
    $datetest="";
    $i =0;
    while($datetime[$i]!=' '){
        $datetest.=$datetime[$i];
        $i++;
    }
    $results="SELECT * FROM orders WHERE (Date(deliverytime)='$datetest' and status='Accepted' and OrderId!=$oid)";
    $t=mysqli_query($connect,$results);
    $destinations='';
    $intermediate=array();

    while($row = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
        $destinations.=urlencode($row['Address']);
        $destinations.='|';
    }

    $addressurl=urlencode($address);
    $final='https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$addressurl.'&destinations='.$destinations.'&key=AIzaSyCON3axt0wBu2DVDlQvyBsUI8cvPq8rIkE';
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

    $newresults ="SELECT * FROM orders WHERE (Date(deliverytime)='$datetest' and status='Accepted'and OrderId!=$oid)";
    $new=mysqli_query($connect,$newresults);
    $eaterieswithdistances=array();
    $index=0;
    $count_outputted=0;

    while($newrow = $new->fetch_array(MYSQLI_ASSOC)) {
        $temp=new eateries;
        $temp->data=$newrow;
        $temp->distance=$resp['rows'][0]['elements'][$index]['duration']['value'];
        $index++;
        $query="Select deliverytime FROM orders where OrderId=$newrow[OrderId]";
        $n=mysqli_query($connect,$query);
        $time = mysqli_fetch_array($n, MYSQLI_ASSOC);
        $date1 = strtotime($datetime);
        $date2 = strtotime($time['deliverytime']);
        $interval = $date2 - $date1;
        $minutes = $interval / 60;

        $diff=abs(((int)$temp->distance/60)-$minutes);
        if($diff<60){
            $count_outputted++;
            array_push($eaterieswithdistances,$temp->data['OrderId']);
        }
    }

    echo json_encode($eaterieswithdistances);


}

?>