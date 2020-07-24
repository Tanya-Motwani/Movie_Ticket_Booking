<?php
// Start the session
session_start();
include '../connect.php';	

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MovieBuster</title>
	<!-- JQuery CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

  
    <!-- Custom styles for this template -->
    <link href="../css/new-age.min.css" rel="stylesheet">
	<style>
  
	.carousel-inner img {
		width: 100%;
		height: 90%;
	}
	.card-img-top{
		max-height:300px;
	}
	.shadow{
    -webkit-box-shadow: 0 14px 6px -6px #777;
       -moz-box-shadow: 0 14px 6px -6px #777;
            box-shadow: 0 14px 6px -6px #777;
	}
	.bg-sec{
	  background: #ed4264; /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #ed4264, #ffedbc); /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #ed4264, #ffedbc); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}
	#error-msg{
		color:red;
	}
  </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background: black">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Movie Buster</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#">Neel Ponkia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="logout.php" style="color: #fdcc52">Log out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


	<section id="signup">
		<div class="container">
		<div class="section-heading text-center">
          <h2>Register now and start booking your tickets</h2>
          <hr>
		  <br>
        </div>
    <div class="row">
        <div class="col-md-4 col-lg-4 mx-auto">
                <div class="card card-body">
                    <h3 class="text-center mb-4">Sign-up</h3>
                    
                    <fieldset>
						<div class="form-group has-error">
                            <input class="form-control is-valid" placeholder="Full Name" name="fullName" id="fullname" type="text">
                        </div>
                        <div class="form-group has-error">
                            <input class="form-control is-valid" placeholder="E-mail Address" name="email" id="email" type="text">
                        </div>
                        <div class="form-group has-success">
                            <input class="form-control is-valid" placeholder="Password" name="password" value="" id="pass1" type="password">
                        </div>
                        <div class="form-group has-success">
                            <input class="form-control is-valid" placeholder="Confirm Password" name="password" id="pass2" value="" type="password">
                        </div>
                        
                        <input class="btn btn-lg btn-primary btn-block" value="Sign Me Up" onclick="signmeup()" type="submit">
                    </fieldset>
                </div>
        </div>
		
    </div>
</div>
	</section>
    <footer>
      <div class="container">
        <p>&copy; Your Website 2018. All Rights Reserved.</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#">Privacy</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Terms</a>
          </li>
          <li class="list-inline-item">
            <a href="#">FAQ</a>
          </li>
        </ul>
      </div>
    </footer>
	
<div class="modal fade" id="bookMovie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Please Sign In to Continue Booking
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="signinsucess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sign In Sucessful
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="signupsucess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        SignUp Sucessful
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/new-age.min.js"></script>

  </body>
</html>
