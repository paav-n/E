<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Enthalpy</title>
<!--
Newline Template
http://www.templatemo.com/tm-503-newline
-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/templatemo-style.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<?php
  if (isset($_POST['form-submit'])) {
      $phone=$_POST['phone'];
      $type=$_POST['msgtype'];
      $to = "gerry@enthalpylogistics.com";
      $subject = $_POST['name'];
      $message = "
<html>
<head>
<title>" . $type . "</title>
</head>
<body>
<p> " . $_POST['message'] . "</p>
<br>
<br>
Contact me at: " . $phone . "
</body>
</html>";
      $from = $_POST['email'];
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers.= "From: <" . $from . "> \r\n";

      if (mail($to, $subject, $message, $headers)) {
          mail("paavan@enthalpylogistics.com", $subject, $message, $headers);
      }
      else {
          echo "failed";
      }
  }
?>
<body>
<div class="cd-full-width first-slide">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="content first-content">
          <h4><br><br><br>Thank you for contacting us</h4>
          <p>We Hope to repsond to you shortly.</p>
          <div class="primary-button">
            <a href="index.html">Return to Enthalpy</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
