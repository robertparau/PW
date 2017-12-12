<?php

session_start();
$_SESSION['message'] = '';


$mysqli = new mysqli("localhost", "root", "", "rental");

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
	if ($_POST['password'] == $_POST['confirmpassword']) //password check
	{
		$username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $phone = $mysqli->real_escape_string($_POST['phone']);

        //hash password for security
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
		
		$sql = "INSERT INTO users (username, email, password, phone) " . "VALUES ('$username', '$email', '$password', '$phone')";
		
		if ($mysqli->query($sql) === true)
		{
			include_once 'dbl.php';
			exit();
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