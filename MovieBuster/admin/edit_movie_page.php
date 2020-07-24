<?php

session_start();

include '../connect.php';

if (isset($_POST['submit'])) {
	$srno = $_POST['sr_no'];
	$name = $_POST['name'];
	$seat_booked = $_POST['seat_booked'];
	$movie_language = $_POST['movie_language'];
	$movie_time = $_POST['movie_time'];
	$theater_name = $_POST['theater_name'];
	$audi_no = $_POST['audi_no'];

	// echo $srno;
	if (empty($srno) && empty($name) && empty($seat_booked) && empty($movie_language) && empty($movie_time) && empty($theater_name) && empty($audi_no)) {
		$_SESSION['empty_fields'] = "Empty Fields!!";
	}


	$sql   = "update movie_details set movie_name='".$name."', seat_booked=".$seat_booked.",movie_lang='".$movie_language."',movie_time='".$movie_time."',theater_name='".$theater_name."',audi_no=".$audi_no." where srno=".$srno;
	// echo $sql;		
	$result = mysqli_query($conn, $sql);		
			
	if(mysqli_affected_rows($conn) > 0) {
		// $_SESSION['uname']=$uname;
		// echo $SESSION['uname'];
		echo "Updated Successfully!!";
		echo "<br> You are being redirected....";
		header("Refresh:5; url='managemovies.php'");		
		
    }
	else {
		// $_SESSION['login_error_msg'] = "Sorry, that user Email or Password is incorrect. Please try again.";	    
		echo "Failed";
		header('location:edit_movie.php?id='.$srno);
	}	

	// echo "faileeed";

	mysqli_close($conn);
	
}

//   header('Refresh: 2; URL = login.php');


?>