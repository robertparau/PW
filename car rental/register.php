<?php

include_once 'connect.php'

?>
<head>
    <title>Sign Up</title>
    <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
    <link href="css/register.css" rel="stylesheet">
   
</head>


<body>
<a href="index.php" class="btn btn-primary btn-lg"><-Back</a>

<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?=$_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="text" placeholder="Phone" name="phone" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div> 
</body>