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
	<script src="JS/Booking2Js.js"></script>
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
	<h1 align='center' class='head'>Bookings</h1>
	<br>
	<?php
		if($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$us = $_POST['users'];
			$fairports = $_POST['fairports'];
			$tairports = $_POST['tairports'];
			$date = $_POST['date'];

			if ($us == 'emp')
			{
				echo "Please select a user";
			}
			else if ($fairports == 'emp')
			{
				echo "Please select your point of departure";
			}
			else if ($tairports == 'emp')
			{
				echo "Please select your destination";
			}
			else if (empty($date))
			{
				echo "Please enter a date";
			}
			else if (strcmp($fairports, $tairports) == 0)
			{
				echo "Airports cannot be the same";
			}
			else
			{
				require("../Model/DbConnect.php");
			
				$sql = "SELECT * FROM flights WHERE fairports = ? AND tairports = ? AND date = ?";

				$stmt = $conn->prepare($sql);
				$stmt->bind_param("sss", $fairports, $tairports, $date);
				$res = $stmt->execute();
				

				$isValid = false;
				
				echo "<center>";
					echo "<table border='5'>";
						echo "<thead>";
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

				$ind = 0;
				$names = array();
				if ($res) 
				{
					$data = $stmt->get_result();
					if ($data->num_rows > 0) 
					{
						while ($row = $data->fetch_assoc())
						{
							$names[$ind++] = $row["flightno"];
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
							$isValid = true;
						}
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
				
				if($isValid)
				{
					echo "<form name='booking2_js' action='../Controller/BookingAction.php' method='POST' onsubmit='sendData(this);return false;'>";
						echo "<br><br>";

						echo "<fieldset>";
							echo "<legend align='center'><h1>Select flight</h1></legend>";
							echo "<fieldset align='center'>";
								echo "<br>";

								echo "<label>Flight  </label>";
								echo "<select name='flightnos'>";
									echo "<option value='emp' selected>Not selected</option>";
									for($i=0;$i<count($names);$i++)
									{
									    echo "<option value=".$names[$i].">".$names[$i]."</option>";
									}
								echo "</select>";
								echo "<br><p id='rp1' style='color: red;'></p><br>";

								echo "<label>User:  </label>";
								echo "<select name='users'>";
									echo "<option value=".$us." selected>".$us."</option>";
								echo "</select>";
								echo "<br><p id='rp2' style='color: red;'></p><br>";

								echo "</fieldset>";
							
							echo "<br>";
							
							echo "<input type='submit' name='submit' value='Book'>";
							echo "<br><br>";
						
						echo "</fieldset>";
						echo "<br><br>";
					echo "</form>";
				}
				else
				{
					echo "No flights found";		
				}				
			}
		}
	?>

	<footer>
		<label><b>Number of Logins (Last 24 hours): <?php echo $_COOKIE[$_SESSION['user']] ?></b></label>
		<div id="foots">
			<h4>Hotline 18992, +99 04552881352 Reservation +88017865434-953</h4>
			<h4>© 2021 Airlines Reservation. All rights reserved.</h4>
		</div>
	</footer>
</body>
</html>