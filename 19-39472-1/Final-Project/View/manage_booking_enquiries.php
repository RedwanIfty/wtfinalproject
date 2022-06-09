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
 	<title>Booking equries</title>
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
	<br><br>
	<h1>Booking enquires</h1>
	<div class="align">
		<table>
			<tr>
				<th>Flight Name</th>
				<th>Desnination</th>
				<th>Starting From</th>
				<th>Departure date</th>
				<th>Cost</th>
				<th>Status</th>
			</tr>
			<tr>
				<td>US Bangla</td>
				<td>Qatar </td>
				<td>Dhaka</td>
				<td>13-12-2021</td>
				<td>1200 $</td>
				<td>Sceduled</td>
			</tr>
			<tr>
				<td>US Bangla</td>
				<td>Turki </td>
				<td>Dhaka</td>
				<td>13-12-2021</td>
				<td>1000 $</td>
				<td>Sceduled</td>
			</tr>
			<tr>
				<td>Turkish</td>
				<td>Istanbul </td>
				<td>Dhaka</td>
				<td>13-12-2021</td>
				<td>1200 $</td>
				<td>Sceduled</td>
			</tr>
			<tr>
				<td>Banladesh Biman</td>
				<td>Qatar </td>
				<td>Dhaka</td>
				<td>13-12-2021</td>
				<td>1200 $</td>
				<td>Sceduled</td>
			</tr>
		</table>
	</div>

 </body>
 </html>
 <?php include 'footer.php' ?>