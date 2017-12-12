<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") 
{	
	$mysqli = new mysqli("localhost", "root", "", "rental");
	$car_id = $mysqli->real_escape_string($_POST['cars']);
    $days = $mysqli->real_escape_string($_POST['days']);
    $id=$_SESSION['u_id'];
    if($car_id != -1) 
    {	
    	if($days > 0) 
    	{
			$sql = "UPDATE users SET Car_id='$car_id',days_left='$days' WHERE id='$id'";
			$_SESSION['u_cid'] = $car_id ;
			$_SESSION['u_daysleft'] =$days;

				if ($mysqli->query($sql) === true)
				{	
					$sql2 = "UPDATE cars SET amount = amount - 1 WHERE Car_id='$car_id'";
					if ($mysqli->query($sql2) === true)
					{
						$_SESSION['message'] = 'Success ! Car rented successfuly';
						header( "location: redirect.php" );
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
		else
		{
			$_SESSION['message'] = "Please specify the correct number of days";
		}
    }
	else
	{
		$_SESSION['message'] = "Please select a car";
	}
}
			
?>