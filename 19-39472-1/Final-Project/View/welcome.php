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
 	<title>Welcome</title>
 	<link rel="stylesheet" type="text/css" href="css/index.css">
 </head>
 <body>
 	<!-- b>Click to view flight details </b><br><br>
 	<a href="viewflightdetails.php">View flight details</a>
 	<hr>
 	<b>Click to Manage ticket booking </b><br><br>
 	<a href="manageticketbooking.php">Manage ticket booking</a>
 	<hr>
 	<b>Click to Manage airline enquiries </b><br><br>
 	<a href="manage_airline_enquiries.php">Manage Airline Enquiries</a>
 	<hr>
 	<b>Click to Manage booking enquiries </b><br><br>
 	<a href="manage_booking_enquiries.php">Manage Booking Enquiries</a>
 	<hr>
 	<b>Click to Verify reservation </b><br><br>
 	<a href="verify_reservation.php">Verify reservation</a>
 	<hr> -->
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

 	<?php 
 	echo "<br><br>";
	echo "<h1>Welcome, " .$_SESSION['uname']."</h1>"; 
	echo "<br><br>";
	echo ""; ?>
 	
 </body>
 </html>
 <?php include 'footer.php' ?>