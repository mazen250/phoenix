<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- <link rel="icon" type="image/png" href="images/favicon.png"> -->
	<link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
	<link rel="stylesheet" href="css/new.css">
</head>

<body style="background-color: #3f4f67;">
	<div style="background-color: #056ca6; width: 33%; min-width: 300px; border-radius: 15px; margin: 30px auto; padding: 40px;">
		<?php
		if (count($error) > 0) {
			echo ("<div style='padding: 20px 0 20px 0;
				margin: 20px auto;
				width: 300px;
				max-width: 60%;
				height: 10%;
				background-color: #3f4f67;
				font-weight: bolder;
				border-radius: 20%;
				color: white;
				text-align: center;'>");
			foreach ($error as $errori) {
				echo ($errori);
				echo ("<br>");
			}
			echo ("</div>");
		}
		?>
		<form method="post" class="login100-form validate-form">
			<span class="login100-form-logo" style="margin-bottom: 35px;">
				<img src="images/logo.jpg" width="80" height="80" alt="">
			</span>

			<div class="wrap-input100 validate-input" data-validate="Enter username">
				<input class="input100" type="text" name="username" placeholder="Username">
				<span class="focus-input100" data-placeholder="&#xf207;"></span>
			</div>
			<div class="wrap-input100 validate-input" data-validate="Enter password">
				<input class="input100" type="password" name="password" placeholder="Password">
				<span class="focus-input100" data-placeholder="&#xf191;"></span>
			</div>
			<div class="container-login100-form-btn">
				<button type="submit" style="cursor:pointer;" name="Login" class="login100-form-btn">
					Login</buuton>
			</div>
			<div class="text-center p-t-90">
				<a class="txt1" href="https://phoenixacademy.uk.com/">
					<img src="images/phoenixacademy.png" height="30" alt="">
				</a>
				<br>
				<a class="txt1" href="https://phoenixacademy.uk.com/">
					Go To phoenixacademy.uk.com
				</a>
			</div>
		</form>
	</div>
	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
</body>

</html>