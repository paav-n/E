<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Table</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
                <table>
                    <thead>
                    <tr class="table100-head">
                        <th class="column1">Date</th>
                        <th class="column2">Name</th>
                        <th class="column3">Order</th>
                        <th class="column4">E-mail</th>
                        <th class="column5">Address</th>
                        <th class="column6">OrderID</th>
                    </tr>
                    </thead>
                    <tbody>
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
                    $results = "SELECT * FROM orders ORDER BY OrderId DESC";
                    $w=mysqli_query($connect,$results);
                    while($row = $w->fetch_array(MYSQLI_ASSOC)) {
                        ?>
                        <tr>
                            <td class="column1"><?php echo $row['Date']?></td>
                            <td class="column2"><?php echo $row['Name']?></td>
                            <td class="column3"><?php echo $row['Details']?></td>
                            <td class="column4"><?php echo $row['Email']?></td>
                            <td class="column5"><?php echo $row['Address']?></td>
                            <td class="column6"><?php echo $row['OrderId']?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
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