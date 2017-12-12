<?php

session_start();
include_once('rentCar.php');
$_SESSION['message'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Rent a vehicle</title>

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
            <?php
                if(isset($_SESSION['u_id'])) {
                    $mysqli = new mysqli("localhost", "root", "", "rental");
                    if($_SESSION['u_cid'] == 0) 
                    {
                        if($_SESSION['u_id'] == 1)  
                        {
                            echo '<a href="listusers.php" class="btn btn-primary btn-lg">List users</a>';
                        }
                        $sql = "SELECT Car_name ,Car_id FROM cars WHERE amount > 0";
                        $result = $mysqli->query( $sql );
                        echo"                    
                        <div class='module'>
                        <h1>Rent a car</h1>
                            <form class='form' action='rent.php' method='post' enctype='multipart/form-data' autocomplete='off'>
                                <div class='alert alert-error'>".$_SESSION['message']."</div>
                                <select name='cars'>
                                    <option value='-1' selected='selected'>Choose a car</option>
                        ";
                        while( $row = $result->fetch_assoc() )
                        {
                            echo "<option value='".$row['Car_id']."'>".$row['Car_name']."</option>";
                        }
                        echo"  </select>
                        <input type='text' placeholder='Number of Days' name='days' required /><br /><br />
                                <input type='submit' value='Confirm' name='register' class='btn btn-primary btn-lg' />
                            </form>
                        </div>";
                    }
                    else
                    {
                        echo "
                        <div class='alert alert-error'>Sorry, but you can only rent one car per account. For returning cars please contact the admin. Your current car is:</div>";
                        $cid=$_SESSION['u_cid'];

                        $sql = "SELECT Car_name, Car_FE, Car_seats, Car_pic, amount FROM cars WHERE Car_id = $cid";
                        $result = $mysqli->query( $sql );
                        while( $row = $result->fetch_assoc() )
                        {
                            echo "<div class='gallery'>
                            <a target='_blank'>
                            <img src='".$row['Car_pic']."' alt='car image' width='300' height='200'>
                            </a>
                            <p>".$row['Car_name']."</p>
                            <p>Days left:".$_SESSION['u_daysleft']."</p>

                            </div>
                            ";
                        }
                    }
                }
                else {
                    echo"Please <a href='login.php'>log in</a> or <a href='register.php'>create an account</a> to rent cars";
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