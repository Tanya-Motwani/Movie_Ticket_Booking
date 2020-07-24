<?php 

session_start();

if (isset($_SESSION['uname'])) {
    // $_SESSION['login_error_msg'] = "Please Login First!!";
    header('location:home.php');
}

 ?>
<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<body>
			<div class="content">
				<div class="title">Welcome Admin | Log In</div>
				<form name="loginFrom" action="login.php" method="post" onsubmit="return validateForm()">
					<input type="text" name="email" required="required" placeholder="E-mail"/>
					<input type="password" name="password" required="required" placeholder="Password"/>
					<span style="color: red"><?php if (isset($_SESSION['login_error_msg'])) {
						echo $_SESSION['login_error_msg'];
					} ?></span>
					<input type="checkbox" id="rememberMe"/>
					<br><br>
					<input type="submit" name="submit" value="Sign In" style="background: #66a756;color: white;cursor: pointer;">
				</form>
			</div>
			<script type="text/javascript">
				function validateForm() {
					var x = document.forms["loginForm"]["email"].value;
					var y = document.forms["loginForm"]["password"].value;
					if (x == "" && y == "") {
						alert("Email and Password can not be empty");
						return false;
						}
						else if (x == "") {
						alert("Email must be filled out");
						return false;
						}
						else if (y == "") {
						alert("Password must be filled out");
						return false;
					}
				}
			</script>
		</body>
	</head>
</html>