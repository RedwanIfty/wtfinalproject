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
		<title>Airlines Scheduling</title>
		<script src="JS/SchedulingJs.js"></script>
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

		<form name="scheduling_js" action="../Controller/SchedulingAction.php" method="POST" onsubmit="sendData(this);return false;">
			
			<h1 align='center' class='head'>Airlines Scheduling</h1>
			<br>

			<fieldset>
				<fieldset align="center">
					<legend align="center"><h2>Flight Details</h2></legend>
						<br>
					    <label align="center">Flight Name </label>
						<select name="flights">
							<option value="emp" selected>Not selected</option>
							<option value="BIMAN BANGLADESH AIRLINES">BIMAN BANGLADESH AIRLINES</option>
							<option value="NOVOAIR">NOVOAIR</option>
							<option value="REGENT AIRWAYS">REGENT AIRWAYS</option>
							<option value="US-BANGLA AIRLINES">US-BANGLA AIRLINES</option>
						</select>
						<br><p id='rp1' style='color: red;'></p><br>

						<label align="center">Flight No. </label>
						<input type="text" name="flightno">
						<br><p id='rp2' style='color: red;'></p><br>

						<label>From </label>
						<select name="fairports">
							<option value="emp" selected>Not selected</option>
							<option value="Cox's Bazar Airport, Cox's Bazar">Cox's Bazar Airport, Cox's Bazar</option>
							<option value="Barisal Airport, Barisal">Barisal Airport, Barisal</option>
							<option value="Shah Amanat International Airport, Chittagong">Shah Amanat International Airport, Chittagong</option>
							<option value="Hazrat Shahjalal International Airport, Dhaka">Hazrat Shahjalal International Airport, Dhaka</option>
							<option value="Jessore Airport, Jessore">Jessore Airport, Jessore</option>
							<option value="Shah Makhdum Airport, Rajshahi">Shah Makhdum Airport, Rajshahi</option>
							<option value="Saidpur Airport, Saidpur">Saidpur Airport, Saidpur</option>
							<option value="Osmani International Airport, Sylhet">Osmani International Airport, Sylhet</option>
						</select>
						<br><p id='rp3' style='color: red;'></p><br>

						<label>To </label>
						<select name="tairports">
							<option value="emp" selected>Not selected</option>
							<option value="Cox's Bazar Airport, Cox's Bazar">Cox's Bazar Airport, Cox's Bazar</option>
							<option value="Barisal Airport, Barisal">Barisal Airport, Barisal</option>
							<option value="Shah Amanat International Airport, Chittagong">Shah Amanat International Airport, Chittagong</option>
							<option value="Hazrat Shahjalal International Airport, Dhaka">Hazrat Shahjalal International Airport, Dhaka</option>
							<option value="Jessore Airport, Jessore">Jessore Airport, Jessore</option>
							<option value="Shah Makhdum Airport, Rajshahi">Shah Makhdum Airport, Rajshahi</option>
							<option value="Saidpur Airport, Saidpur">Saidpur Airport, Saidpur</option>
							<option value="Osmani International Airport, Sylhet">Osmani International Airport, Sylhet</option>
						</select>
						<br><p id='rp4' style='color: red;'></p><br>

						<label>Date </label>
						<input type="Date" min="<?php $tomorrow = date("Y-m-d", strtotime('tomorrow')); echo $tomorrow;?>" name="date">
						<br><p id='rp5' style='color: red;'></p><br>

						<label>Departure Time </label>
						<input type="time" name="departure">
						<br><p id='rp6' style='color: red;'></p><br>

						<label>Arrival Time </label>
						<input type="time" name="arrival">
						<br><p id='rp7' style='color: red;'></p><br>
				</fieldset>

				<br>
				
				<center>
					<input type="submit" name="submit" value="Done">
					<br>
					
				</center>
			
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