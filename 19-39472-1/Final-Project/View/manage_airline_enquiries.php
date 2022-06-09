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
 	<title>Airline enquiries</title>
 	<link rel="stylesheet" type="text/css" href="css/index.css">
 	<style>
 		.c1{
 			text-align: center ;
 			font-size: medium;
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
	<br><br>
	<h1>Airline enquries</h1>
	<div class="c1">
		<p>Biman Bangladesh Airlines, commonly known as Biman, pronounced, is the national flag carrier of Bangladesh. </p>
		<p>CEO: Mokabbir Hossain (Sep 12, 2019)</p>
		<p>Headquarters: Dhaka,</p>
		<p>Founded: January 4, 1972, Dhaka</p>
		<p>Revenue: 57.91 billion BDT (US$690 million, 2018–2019)</p>
		<p>Total assets: 20.82 billion BDT (US$250 million, 2018–2019)</p>
		<p>Hubs: Hazrat Shahjalal International Airport, Osmani International Airport, Sylhet</p>
	</div>
 </body>
 </html>
 <?php include 'footer.php' ?>