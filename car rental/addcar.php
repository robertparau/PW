<?php

include_once 'connect2.php'

?>
<head>
    <title>AddCar</title>
    <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
    <link href="css/register.css" rel="stylesheet">
   
</head>


<body>
<a href="Rent.php" class="btn btn-primary btn-lg"><-Back</a>

<div class="body-content">
  <div class="module">
    <h1>Add a new car</h1>
    <form class="form" action="addcar.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?=$_SESSION['message'] ?></div>
      <input type="text" placeholder="Car Name" name="c_name" required />
      <input type="text" placeholder="Car FE" name="c_fe" required />
      <input type="text" placeholder="Car Seats" name="c_seats" required />
      <div class="avatar"><label>Add car picture: </label><input type="file" name="c_pic" accept="image/*" required /></div>
      <input type="submit" value="Add car" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div> 
</body>