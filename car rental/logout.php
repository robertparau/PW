<?php
session_start();



if (isset($_SESSION['u_id'])) {
	session_unset();
	session_destroy();
}
?>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link href="css/register.css" rel="stylesheet">

<div class="body-content">
  <div class="module">
    <div class="alert alert-success">Logout successful</div>
  </div>
</div>
<meta http-equiv="refresh" content="2;url=http://localhost/pw/RentACar/" />