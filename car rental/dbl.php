<?php

session_start();
$_SESSION['message'] = '';


	$conn = new mysqli("localhost", "root", "", "acc");

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			$_SESSION[ 'message' ] = "User not found";
			header("location: login.php");
			exit();
		} else {
			if($row = mysqli_fetch_assoc($result)) {
				//dehash pass
				if(password_verify($password, $row['password'])){
					//log in the user
					$_SESSION['u_id'] =$row['id'];
					$_SESSION['u_name'] =$row['username'];
					$_SESSION['u_email'] =$row['email'];
					$_SESSION['u_phone'] =$row['phone'];
					header("location: success.php");
					exit();
				} else {
					$_SESSION[ 'message' ] = "Wrong Password";
					header("location: login.php");
					exit();
				}
			}
		}

?>