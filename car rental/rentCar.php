<?php

session_start();
$_SESSION['message'] = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
		$mysqli = new mysqli("localhost", "root", "", "rental");
		$car_id = $mysqli->real_escape_string($_POST['cars']);
        $days = $mysqli->real_escape_string($_POST['days']);
        $id=$_SESSION['u_id'];
		$sql = "UPDATE users SET Car_id='$car_id',days_left='$days' WHERE id='$id'";

				if ($mysqli->query($sql) === true)
				{	
					$sql2 = "UPDATE cars SET amount = amount - 1 WHERE Car_id='$car_id'";
					if ($mysqli->query($sql) === true)
					{
						header( "location: index.php" );
					}
					else
					{
						$_SESSION['message'] = "Could not register the update";
					}
				}
				else
				{
					$_SESSION['message'] = "Could not rent the car";
				}
}
			
?>