<?php

session_start();
$_SESSION['message'] = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{	
	$mysqli = new mysqli("localhost", "root", "", "rental");
	$user_id = $mysqli->real_escape_string($_POST['Uid']);

    $sql = "SELECT username from users where id=$user_id";
	$result = $mysqli->query( $sql );

	if(mysqli_num_rows($result) > 0)
	{
    	$sql = "UPDATE users SET Car_id='0',start_date='0000-00-00',end_date='0000-00-00' WHERE id='$user_id'";
		if ($mysqli->query($sql) === true){
			$_SESSION['message'] = 'Success ! Car returned successfuly';
			header( "location: redirect.php" );
		}
		else
		{
			$_SESSION['message'] = 'Could not return the car';
		}
	}
	else 
	{
		$_SESSION['message'] = 'User does not exist';
	}
}
			
?>