<html lang="en">

<body>

    <!-- Navigation -->
    <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                	<span class="glyphicon glyphicon-fire"></span> 
                	LOGO
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                            <li><a href="carGallery.php">Cars</a></li>
                        </ul>
                    </li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a href="rent.php">Rental</a></li>
							<li><a href="#">Plan a trip</a></li>
							<li><a href="#">Demo a car</a></li>
						</ul>
					</li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <?php
					if(isset($_SESSION['u_id'])) {
						echo '<li>
                        <a href="logout.php">Logout</a>
                    </li>';
                    } else {
                    	echo '<li>
                        <a href="register.php">Sign Up</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>';
                    }
                    ?>
                </ul>
                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</body>
</html>