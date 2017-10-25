<?php
session_start();
$_SESSION['message'] = '';

$mysqli = new mysqli("localhost", "root", "", "acc");

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
	if ($_POST['password'] == $_POST['confirmpassword']) //password check
	{
		$username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $phone = $mysqli->real_escape_string($_POST['phone']);

        //md5 hash password for security
        $password = md5($_POST['password']);
		
		$_SESSION['username'] = $username;
		$sql = "INSERT INTO users (username, email, password, phone) " . "VALUES ('$username', '$email', '$password', '$phone')";
		
		if ($mysqli->query($sql) === true)
		{
			$_SESSION[ 'message' ] = "Registration succesful! Added $username to the database!";
			
			header( "location: welcome.php" );
		}
		else
		{
			$_SESSION['message'] = "User could not be registered";
		}

	}
	else 
	{
		$_SESSION['message'] = "Passwords did not match";
	}
}
?>