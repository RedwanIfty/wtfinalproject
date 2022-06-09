<?php
	session_start();
	if($_SESSION['uname']==false)
	{
		header("location:Login.php");
	}
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Verify Reservation</title>
 	<link rel="stylesheet" type="text/css" href="css/index.css">
 	<script type="text/javascript" src="js/verifyreservation.js"></script>
 	<style>
		table,th,td{
			border: 1px solid black;
			border-collapse: collapse;
			align-content: center;
			margin-left: auto;
			margin-right: auto;
		}
		th,td{
			padding: 5px;
		}
		.align{
			text-align: center;
		}
	</style>
 </head>
 <body>
 	<br><br><br>
 	<h1>Verify reservation</h1>
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
	<form action="">
		<div class="align">
			Search:
			<input type="text" name="Serach" placeholder="search by passenger name" onkeyup="showHint(this.value)">
		</div>
	</form>
	<div id="txtHint"></div>
 </body>
 </html>
 <?php include 'footer.php' ?>