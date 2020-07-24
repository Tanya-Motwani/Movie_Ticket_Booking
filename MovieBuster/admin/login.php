<?php

session_start();

include '../connect.php';

if (isset($_POST['submit'])) {
	$uname = $_POST['email'];
	$pass  = $_POST['password'];
	$sql   = "SELECT * from user_details where email_id = '".$uname."' and password = '".$pass."' and admin=1";
	echo $sql;		
	$result = mysqli_query($conn, $sql);		
			
	if(mysqli_num_rows($result) > 0) {
		$_SESSION['uname']=$uname;
		echo $SESSION['uname'];
		header('location:home.php');		
		
    }
	else {
		$_SESSION['login_error_msg'] = "Sorry, that user Email or Password is incorrect. Please try again.";	    
		header('location:index.php');
	}	

	mysqli_close($conn);
	
}

//   header('Refresh: 2; URL = login.php');


?>