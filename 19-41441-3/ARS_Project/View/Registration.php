<?php
	session_start();
	if(count($_SESSION) === 0)
	{
		header("Location: ../Controller/Logout.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registration</title>
		<script src="JS/RegistrationJs.js"></script>
		<link rel="stylesheet" href="CSS/header.css">
		<link rel="stylesheet" href="CSS/footercss.css">
	</head>
	<body>
		<header>
			<div class="banner">
				<div class="navbar">
					<label id="logo"><i><b>Safe Escape</b></i></label>
					<ul>
						<li><a href="Home.php">Home</a></li>
						<li><a href="RegistrationOption.php">Profiles</a></li>
						<li><a href="RestrictAccess.php">Restrict Access</a></li>
						<li><a href="Scheduling.php">Airlines Scheduling</a></li>
						<li><a href="Booking.php">Bookings</a></li>
						<li><a href="Search.php">Search</a></li>
						<li><a href="../Controller/Logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</header>

		<form name="js_reg" action="../Controller/RegistrationAction.php" method="POST" onsubmit="sendData(this);return false;">
			
			<h1 align='center' class='head'>Profiles</h1>
			<br>

			<fieldset>
				<fieldset align="center">
					<legend align="center"><h2>Login Details</h2></legend>
						<br>
					    <label align="center">Username </label>
						<input type="text" name="username" align="center">
						<br><p id="rp1" style="color: red;"></p><br>

						<label>Password </label>
						<input type="password" name="password">
						<br><p id="rp2" style="color: red;"></p><br>

						<label>Confirm Password </label>
						<input type="password" name="cpassword">
						<br><p id="rp3" style="color: red;"></p><br>
				</fieldset>
				
				<fieldset align="center">

					<legend align="center"><h2>Personal Information</h2></legend>
						<br>
						<label>First Name </label>
						<input type="text" name="firstname">
						<br><p id="rp4" style="color: red;"></p><br>

					    <label>Surname </label>
						<input type="text" name="surname">
						<br><p id="rp5" style="color: red;"></p><br>						

						<label>Email </label>
						<input type="email" name="email">
						<br><p id="rp6" style="color: red;"></p><br>

						<label>Date of birth </label>
						<input type="Date" name="dob">
						<br><p id="rp7" style="color: red;"></p><br>

						<label>Type of user </label>
						<input id="radio1" type="radio" name="type" value="passenger">Passenger
						<input id="radio2" type="radio" name="type" value="admin">Admin
						<br><p id="rp8" style="color: red;"></p><br>
				</fieldset>

				<br>
				<input type="submit" name="submit" value="Create">
				<br>

				<script>
					
				</script>
			
			</fieldset>
			<br>
			<center>
				<a href="Home.php"><button type="button"><b>Go Back</b></button></a>				
			</center>
			<br><br>
		</form>
		<footer>
			<label><b>Number of Logins (Last 24 hours): <?php echo $_COOKIE[$_SESSION['user']] ?></b></label>
			<div id="foots">
				<h4>Hotline 18992, +99 04552881352 Reservation +88017865434-953</h4>
				<h4>© 2021 Airlines Reservation. All rights reserved.</h4>
			</div>
		</footer>
	</body>
</html>