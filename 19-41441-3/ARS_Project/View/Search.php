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
		<title>Information Searching</title>
		<script src="JS/SearchingJs.js"></script>
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

		<form name="search_js" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
			
			<h1 align='center' class='head'>Search</h1>
			<br>

			<fieldset>
				<fieldset align="center">
					<legend align="center"><h2>Information</h2></legend>
						<br>
					    <label>Category </label>
						<select name="category">
							<option value="emp" selected>Not selected</option>
							<option value="Flights">Flights</option>
							<option value="Users">Users</option>
							<option value="Bookings">Bookings</option>
						</select>
						<br><p id='rp1' style='color: red;'></p><br>

						<fieldset align="center">
							
							<?php

								if($_SERVER['REQUEST_METHOD'] === "POST")
								{										
									$category = $_POST['category']; 

									if ($category == 'emp')
									{
										echo "Please select a category";
									}
									else if ($category == 'Flights')
									{
										echo "<legend align='center'><h2>Flights</h2></legend>";
										echo "<br>";


										require("../Model/DbConnect.php");
								    	$sql = "SELECT * FROM flights";

										$stmt = $conn->prepare($sql);
										$res = $stmt->execute();


										echo "<center>";
											echo "<table border='5'>";
												echo "<thead>";

										if ($res)
										{
											$data = $stmt->get_result();

											if ($data->num_rows > 0)
											{
													echo "<tr>";
														echo "<th>";
															echo "Flight";
														echo "</th>";
														echo "<th>";
															echo "Flight No";
														echo "</th>";
														echo "<th>";
															echo "Point of Departure";
														echo "</th>";
														echo "<th>";
															echo "Destination";
														echo "</th>";
														echo "<th>";
															echo "Date";
														echo "</th>";
														echo "<th>";
															echo "Departure Time";
														echo "</th>";
														echo "<th>";
															echo "Arrival Time";
														echo "</th>";
													echo "</tr>";
												echo "</thead>";
												echo "<tbody>";

												while ($row = $data->fetch_assoc())
												{

													echo "<tr>";
														echo "<td>";
															echo $row["flightname"];
														echo "</td>";
														echo "<td>";
															echo $row["flightno"];
														echo "</td>";
														echo "<td>";
															echo $row["fairports"];
														echo "</td>";
														echo "<td>";
															echo $row["tairports"];
														echo "</td>";
														echo "<td>";
															echo $row["date"];
														echo "</td>";
														echo "<td>";
															echo $row["departure"];
														echo "</td>";
														echo "<td>";
															echo $row["arrival"];
														echo "</td>";
													echo "</tr>";
												}
											}
											else
											{
												echo "No records found";
											}
										}
										else
										{
											echo "Error while executing the statement";
										}
													echo "</tbody>";
												echo "</table>";
											echo "</center>";
										echo "<br><br>";

										$conn->close();


									}
									else if ($category == 'Users')
									{
										echo "<legend align='center'><h2>Users</h2></legend>";
										echo "<br>";

										require("../Model/DbConnect.php");
								    	$sql = "SELECT * FROM users";

										$stmt = $conn->prepare($sql);
										$res = $stmt->execute();


										echo "<center>";
											echo "<table border='5'>";
												echo "<thead>";

										if ($res)
										{
											$data = $stmt->get_result();

											if ($data->num_rows > 0)
											{
													echo "<tr>";
														echo "<th>";
															echo "Username";
														echo "</th>";
														echo "<th>";
															echo "Fullname";
														echo "</th>";
														echo "<th>";
															echo "Email";
														echo "</th>";
														echo "<th>";
															echo "Date of Birth";
														echo "</th>";
														echo "<th>";
															echo "Type";
														echo "</th>";
													echo "</tr>";
												echo "</thead>";
												echo "<tbody>";

												while ($row = $data->fetch_assoc())
												{

													echo "<tr>";
														echo "<td>";
															echo $row["username"];
														echo "</td>";
														echo "<td>";
															echo $row["firstname"]." ".$row["surname"];
														echo "</td>";
														echo "<td>";
															echo $row["email"];
														echo "</td>";
														echo "<td>";
															echo $row["dob"];
														echo "</td>";
														echo "<td>";
															echo $row["type"];
														echo "</td>";
													echo "</tr>";
												}
											}
											else
											{
												echo "No records found";
											}
										}
										else
										{
											echo "Error while executing the statement";
										}
													echo "</tbody>";
												echo "</table>";
											echo "</center>";
										echo "<br><br>";

										$conn->close();
									}
									else if ($category == 'Bookings')
									{
										echo "<legend align='center'><h2>Bookings</h2></legend>";
										echo "<br>";



										require("../Model/DbConnect.php");
								    	$sql = "SELECT * FROM bookings";

										$stmt = $conn->prepare($sql);
										$res = $stmt->execute();


										echo "<center>";
											echo "<table border='5'>";
												echo "<thead>";

										if ($res)
										{
											$data = $stmt->get_result();

											if ($data->num_rows > 0)
											{
													echo "<tr>";
														echo "<th>";
															echo "Username";
														echo "</th>";
														echo "<th>";
															echo "Flight";
														echo "</th>";
														echo "<th>";
															echo "Date";
														echo "</th>";
														echo "<th>";
															echo "Departure Time";
														echo "</th>";
														echo "<th>";
															echo "Arrival Time";
														echo "</th>";
													echo "</tr>";
												echo "</thead>";
												echo "<tbody>";

												while ($row = $data->fetch_assoc())
												{

													echo "<tr>";
														echo "<td>";
															echo $row["username"];
														echo "</td>";
														echo "<td>";
															echo $row["flightname"];
														echo "</td>";
														echo "<td>";
															echo $row["date"];
														echo "</td>";
														echo "<td>";
															echo $row["departure"];
														echo "</td>";
														echo "<td>";
															echo $row["arrival"];
														echo "</td>";
													echo "</tr>";
												}
											}
											else
											{
												echo "No records found";
											}
										}
										else
										{
											echo "Error while executing the statement";
										}
													echo "</tbody>";
												echo "</table>";
											echo "</center>";
										echo "<br><br>";

										$conn->close();
									}
								}											
							?>
							<br><br>
						</fieldset>

				</fieldset>

				<br>
				
				<center>
					<input type="submit" name="submit" value="Search">
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