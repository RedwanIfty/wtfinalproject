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
	<title>View Flight</title>
	<script type="text/javascript" src="js/flightdetails.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
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
	<br><br><br><br><br>
	<h1>View Fight Details</h1> 
	<br><br>
	<form  action="">
		<div class="align">
			select:
			<select name="flight" onchange="showFlight(this.value)"><
				<option value="">Select Flight</option>
				<option value="US-Bangla">US-Bangla</option>
				<option value="Biman Bangladesh">Biman Bangladesh</option>
				<option value="Saudia">Saudia</option>
				<option value="Turkish Air">Turkish Air</option>
				<option value="Kuwait Air">Kuwait Air</option>
			</select>
		</div>
		<br><br>
		<div id="txtHint"></div>
		
	</form>
</body>
</html>
<?php include 'footer.php' ?>