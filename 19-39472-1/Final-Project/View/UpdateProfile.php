
  <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="css/index.css">
  	<script type="text/javascript" src="js/updateprofile.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/updateprofile.css">
  	<title>Upadate Profile</title>
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
	<br><br><br>
	<h1>Upadate profile</h1>
	<form action="../Controller/UpdateProfileAction.php" method="POST" onsubmit="sendData(this);return false;">
		<fieldset>
			<div class="align">
			<b>*Name:</b>
			<input type="text" name="name"><b id="name" class="red"></b>
			<br><br>
			<b>*Address:</b>
			<input type="text" name="address" placeholder="address"><b id="address" class="red"></b>
			<br><br>

			<b>*Email:</b>
			<input type="text" name="email"><b id="email" class="red"></b>
			<br><br>
			<input type="submit" name="Update" value="Upadate">
			</div>
		</fieldset>
	</form>
	<p id="res"></p>
  </body>
  </html>
  <?php include 'footer.php' ?>