<?php

session_start();

include '../connect.php';

if (isset($_POST['submit'])) {
	$movie_name = $_POST['movie_name'];
	$day_no = $_POST['day_no'];
	$movie_lang = $_POST['movie_lang'];
	$movie_time = $_POST['movie_time'];
	$theater_name = $_POST['theater_name'];
	$audi_no = $_POST['audi_no'];

	// echo $srno;
	if (empty($movie_name) && empty($day_no) && empty($movie_lang) && empty($movie_time) && empty($theater_name) && empty($audi_no)) {
		$_SESSION['empty_fields'] = "Empty Fields!!";
	}


	$sql   = "insert into movie_details(movie_name, day_no,movie_lang,movie_time,theater_name,audi_no,seat_booked,rating,photo) values('".$movie_name."',".$day_no.",'".$movie_lang."','".$movie_time.":00','".$theater_name."',".$audi_no.",0,0.0,'movie3.jpg')";
	// echo $sql;		
	$result = mysqli_query($conn, $sql);		
			
	if(mysqli_affected_rows($conn) > 0) {
		// $_SESSION['uname']=$uname;
		// echo $SESSION['uname'];
		echo "Inserted Successfully!!";
		echo "<br> You are being redirected....";
		header("Refresh:5; url='add_movie.php'");		
		
    }
	else {
		// $_SESSION['login_error_msg'] = "Sorry, that user Email or Password is incorrect. Please try again.";	    
		echo "Failed";
		header('location:add_movie.php');
	}	

	// echo "faileeed";

	mysqli_close($conn);
	
}

//   header('Refresh: 2; URL = login.php');


?>