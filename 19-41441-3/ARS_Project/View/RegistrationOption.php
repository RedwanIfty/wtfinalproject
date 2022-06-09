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
		<title>Registration</title>
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

		<form>
			
			<h1 align='center' class='head'>Profiles</h1>
			<br>

				<fieldset align="center">
					<legend align="center"><h2>Options</h2></legend>
						<br>
					   	<center>
					   		<table>
					   			<thead>
					   				<th>
					   					<a href="Registration.php"><button type="button"><b>Register</b></button></a>	
					   				</th>
					   			</thead>
					   		</table>
					   		<br>
					   		<table>
					   			<thead>
					   				<th>
					   					<a href="RegistrationUpdate.php"><button type="button"><b>Update</b></button></a>	
					   				</th>
					   			</thead>
					   		</table>
										
						</center>
				</fieldset>
			<br>
			<center>
				<a href="Home.php"><button type="button"><b>Go Back</b></button></a>				
			</center>
			<br><br>
		</form>
		<footer><label><b>Number of Logins (Last 24 hours): <?php echo $_COOKIE[$_SESSION['user']] ?></b></label>
			<div id="foots">
				<h4>Hotline 18992, +99 04552881352 Reservation +88017865434-953</h4>
				<h4>© 2021 Airlines Reservation. All rights reserved.</h4>
			</div>
		</footer>
	</body>
</html>