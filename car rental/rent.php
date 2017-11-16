<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Rental</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/rent.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
</head>
<body>

    <!-- Navigation -->
    <?php
    include_once('navbar.php');
    ?>

    <header>
        <div class="header-content">
        <div>
            <?php
                if(isset($_SESSION['u_id'])) {
                    if($_SESSION['u_id'] == 1)  {
                        echo '<a href="addcar.php" class="btn btn-primary btn-lg">Add New Car</a>';
                    }
                }
            ?>


        </div>
            <?php
            $mysqli = new mysqli("localhost", "root", "", "rental");
            $sql = "SELECT Car_name, Car_FE, Car_seats, Car_pic FROM cars";
            $result = $mysqli->query( $sql );
            while( $row = $result->fetch_assoc() ){

                echo "<div class='userlist'>
                <span>".$row['Car_name']."</span><br />
                <div class='userlist'><span>Locuri: ".$row['Car_seats']."</span><br />
                <div class='userlist'><span>Consum: ".$row['Car_FE']."</span><br />
                <img src='".$row['Car_pic']."'>
                </div>";

            }
            ?>
            


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