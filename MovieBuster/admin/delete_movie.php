<?php

session_start();

include '../connect.php';

$sr_no = $_GET['id'];

// echo $sr_no;
$sql = "delete from movie_details where srno=".$sr_no;
$result = mysqli_query($conn, $sql);		
			
	if(mysqli_affected_rows($conn) > 0) {
		// $_SESSION['uname']=$uname;
		// echo $SESSION['uname'];
		echo "Deleted Successfully!!";
		echo "<br> You are being redirected....";
		header("Refresh:5; url='managemovies.php'");				
    }
	else {
		// $_SESSION['login_error_msg'] = "Sorry, that user Email or Password is incorrect. Please try again.";	    
		echo "Failed";
		header("Refresh:5; url='managemovies.php'");		
	}	




mysqli_close($conn);
	

//   header('Refresh: 2; URL = login.php');


?>