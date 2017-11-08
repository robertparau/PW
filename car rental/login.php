<?php

session_start();
$_SESSION['message'] = '';

?>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link href="css/register.css" rel="stylesheet">

<a href="index.php" class="btn btn-primary btn-lg"><-Back</a>

<div class="body-content">
  <div class="module">
    <h1>Log In</h1>
    <form class="form" action="dbl.php" method="POST">
      <div class="alert alert-error"><?=$_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="password" placeholder="Password" name="password" required />
      <input type="submit" value="Login" name="submit" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
