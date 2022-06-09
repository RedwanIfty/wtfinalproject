<?php
	session_start();
	if($_SESSION['uname']==false)
	{
		header("location:Login.php");
	}
	// echo "<h1>Welcome, " .$_SESSION['uname']."</h1>"; 
	// echo "<br><br>";
	// echo "";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Flight Booking</title>
 	<link rel="stylesheet" type="text/css" href="css/index.css">
 	<script type="text/javascript" src="js/flightbook.js"></script>
 	<link rel="stylesheet" type="text/css" href="css/ticketbooking.css">
 	<style>
 	.align{
 		text-align: center;
 	}
 	</style>
 </head>
 <body>
 <div class="navbar">
	  	<a href="welcome.php">Home</a>
	  	<a href="manageticketbooking.php">Flight Booking</a>
	  	<a href="viewflightdetails.php">View Filght</a>
	  	<a href="verify_reservation.php">Verify reservation</a>
	  	<a href="manage_airline_enquiries.php">Airline Enquiries</a>
 		<a href="manage_booking_enquiries.php">Booking Enquiries</a>
 		<a href='UpdateProfile.php'>Update profile</a>
	  	<a href='Logout.php'>Log out</a>
	</div>
	<form action="../Controller/manageticketbookingAction.php" method="POST" onsubmit="sendData(this);return false;">
			<div class="align">
			<br><br><br>
			<h1>Booking Ticket</h1>
			*Flight No:
			<input type="number" name="flightno"><b id="flightno" class="red"></b>
			<br><br>
			*Passenger Name:
			<input type="text" name="pname"><b id="pname" class="red"></b>
			<br><br>
			*Address Name:
			<input type="text" name="address"><b id="address" class="red"></b>
			<br><br>
			*Flight name:
			<select name="flightname">
				<option value="">Select Flight</option>
				<option value="Bangladesh Biman">Bangladesh Biman</option>
				<option value="US Bangla">US Bangla</option>
				<option value="Qatar Airlines">Qatar Airlines</option>
			</select> <b id="flightname" class="red"></b>
			<br><br>
			Start From:
			<select name="sfrom">
				<option value="">Select departure</option>
				<option value="Dhaka">Dhaka</option>
				<option value="Chittagoan">Chittagoan</option>
				<option value="Dubai">Dubai</option>
				<option value="Abudabi">Abu dabi</option>
				<option value="Doha">Doha</option>
			</select><b id="sfrom" class="red"></b>
			 

			<br><br>

			*Destination:
			<select name="destination" >
				<option value="">Select destination</option>
				<option value="Dhaka">Dhaka</option>
				<option value="Chittagoan">Chittagoan</option>
				<option value="Dubai">Dubai</option>
				<option value="Abudabi">Abu dabi</option>
				<option value="Doha">Doha</option>
			</select> <b id="destination" class="red"></b>
			<br><br>
			*Departure Time&Date:
			<input type="datetime-local" name="dtimedate"><b id="dtimedate" class="red"></b>
			<br><br>
			<input type="submit" name="confirm">
			<br><br>
			<b id="res"></b>
		</div>
	</form>
 </body>
 </html>
 <?php include 'footer.php' ?>