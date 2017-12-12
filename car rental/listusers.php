<?php

session_start();
$_SESSION['message'] = '';

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>User List</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/rental.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/> 
</head>
<body>

    <!-- Navigation -->
    <?php
    include_once('navbar.php');
    ?>
    <header>
        <div class="header-content">
        <table class="table-users" style="width:100%">
            <tr>
                <th>Username</th>
                <th>User ID</th>
                <th>Email</th> 
                <th>Phone</th>
                <th>Car</th>
                <th>Days left for rent</th>
            </tr>
            <?php

            $mysqli = new mysqli("localhost", "root", "", "rental");
            $sql = "SELECT id, username, email, phone, days_left, Car_name FROM users, cars WHERE users.Car_id = cars.Car_id";
            $result = $mysqli->query( $sql );
            while( $row = $result->fetch_assoc() ){
                echo "
                <tr>
                    <td>".$row['username']."</td>
                    <td>".$row['id']."</td> 
                    <td>".$row['email']."</td> 
                    <td>".$row['phone']."</td>
                    <td>".$row['Car_name']."</td>
                    <td>".$row['days_left']."</td>
                </tr>
                ";
            }
            ?>
        
        </table>
        </div>
    </header>

    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    
    <!-- Custom Javascript -->
    <script src="js/custom.js"></script>


</body>
</html>