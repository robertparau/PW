<?php

session_start();
$_SESSION['message'] = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
		$mysqli = new mysqli("localhost", "root", "", "rental");
		$car_name = $mysqli->real_escape_string($_POST['c_name']);
        $car_fe = $mysqli->real_escape_string($_POST['c_fe']);
        $car_seats = $mysqli->real_escape_string($_POST['c_seats']);
        $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['c_pic']['name']);

        if (preg_match("!image!",$_FILES['c_pic']['type'])) {

        	if (copy($_FILES['c_pic']['tmp_name'], $avatar_path)){

				$sql = "INSERT INTO cars (Car_name, Car_FE, Car_seats, Car_pic) " . "VALUES ('$car_name', '$car_fe', '$car_seats', '$avatar_path')";
		
				if ($mysqli->query($sql) === true)
				{
					header( "location: caradded.php" );
				}
				else
				{
					$_SESSION['message'] = "Car could not be registered";
				}
			}
			else
			{
				$_SESSION['message'] = "Error uploading image";
			}

		}
		else 
		{
			$_SESSION['message'] = "File is not an image";
		}
	}

?>