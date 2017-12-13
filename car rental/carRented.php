<?php
	session_start();
?>
<head>

 <title>Success!</title>

<head>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link href="css/register.css" rel="stylesheet">

<div class="body-content">
  <div class="module">
    <div class="alert alert-success">Success! You have rented :</div>
    <?php
    $cid=$_SESSION['u_cid'];
    $mysqli = new mysqli("localhost", "root", "", "rental");
    $sql = "SELECT Car_name, Car_pic FROM cars WHERE Car_id = $cid";
    $result = $mysqli->query( $sql );
    while( $row = $result->fetch_assoc() )
    {
        echo "<div class='gallery'>
        <a target='_blank'>
        <img src='".$row['Car_pic']."' alt='car image' width='300' height='200'>
        </a>
        <p>".$row['Car_name']."</p>
        <p>Pick-up date:  ".$_SESSION['s_date']."</p>
        <p>Return date:  ".$_SESSION['e_date']."</p>

        </div>";
    }
    ?>
    <div class="alert"></div>
  </div>
</div>
<meta http-equiv="refresh" content="2;url=http://localhost/pw/RentACar/" />
		