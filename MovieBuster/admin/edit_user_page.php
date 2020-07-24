<?php

session_start();

include '../connect.php';

if (isset($_POST['submit'])) {
	$user_id = $_POST['user_id'];
	$name = $_POST['name'];
	$email_id = $_POST['email_id'];
	$password = $_POST['password'];

	// echo $user_id;
	if (empty($user_id) && empty($name) && empty($email_id) && empty($password)) {
		$_SESSION['empty_fields'] = "Empty Fields!!";
	}


	$sql   = "update user_details set name='".$name."',email_id='".$email_id."',password='".$password."' where user_id=".$user_id;
	// echo $sql;		
	$result = mysqli_query($conn, $sql);		
			
	if(mysqli_affected_rows($conn) > 0) {
		// $_SESSION['uname']=$uname;
		// echo $SESSION['uname'];
		echo "Updated Successfully!!";
		echo "<br> You are being redirected....";
		header("Refresh:5; url='manageusers.php'");		
		
    }
	else {
		// $_SESSION['login_error_msg'] = "Sorry, that user Email or Password is incorrect. Please try again.";	    
		echo "Failed";
		header('location:manageusers.php');
	}	

	// echo "faileeed";

	mysqli_close($conn);
	
}

//   header('Refresh: 2; URL = login.php');


?>