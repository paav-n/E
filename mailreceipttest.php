<?php

require_once('PHPMailer/PHPMailerAutoload.php');

$mail= new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth();
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username='gerry@enthalpylogistics@gmail.com';
$mail->Password = 'ktgD6pip3vKz3m6';
$mail->SetFrom('no-reply@enthalpylogistics@gmail.com');
$mail->AddAddress('konngerry@gmail.com');
$mail->Send();
?>
