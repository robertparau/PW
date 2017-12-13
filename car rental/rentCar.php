<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") 
{	
	$mysqli = new mysqli("localhost", "root", "", "rental");
	$car_id = $mysqli->real_escape_string($_POST['cars']);
    $start = date("Y-m-d", strtotime($_POST['puday']));
	$end = date("Y-m-d", strtotime($_POST['retday']));
	$st_d = new DateTime($start);
	$end_d	= new DateTime($end);
	$interval = $st_d->diff($end_d);
    $id=$_SESSION['u_id'];
    if($car_id != -1) 
    {	
    	if($interval->days > 0) 
    	{
			$sql = "UPDATE users SET Car_id='$car_id',start_date='$start',end_date='$end' WHERE id='$id'";
			$_SESSION['u_cid'] = $car_id ;
			$_SESSION['s_date'] = $start ;
			$_SESSION['e_date'] = $end ;
			
				if ($mysqli->query($sql) === true)
				{	
					$sql2 = "UPDATE cars SET amount = amount - 1 WHERE Car_id='$car_id'";
					if ($mysqli->query($sql2) === true)
					{
						$_SESSION['message'] = 'Success ! Car rented successfuly';
						header( "location: carRented.php" );
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