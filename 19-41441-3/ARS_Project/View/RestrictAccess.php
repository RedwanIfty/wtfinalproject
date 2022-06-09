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
		<title>Restrict Access</title>
		<script src="JS/RestrictAccessJs.js"></script>
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

		<form name="jsrestrict_js" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="sendData(this);return false;">
			
			<h1 align='center' class='head'>Access Restriction</h1>
			<br>

			<fieldset>
				<fieldset align="center">
					<legend align="center"><h2>Select a user</h2></legend>
						<br>
					    <label align="center"><b>Username </b></label>

					    <?php
					    	require("../Model/DbConnect.php");
					    	$sql = "SELECT * FROM users";

							$stmt = $conn->prepare($sql);
							$res = $stmt->execute();


							echo "<select name='users'>";
								echo "<option value='emp' selected>Not selected</option>";
							if ($res)
							{
								$data = $stmt->get_result();

								if ($data->num_rows > 0)
								{
									while ($row = $data->fetch_assoc())
									{
										echo" <option value=".$row["username"].">".$row["username"]."</option>";
										echo "<br>";
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
							echo "</select>";

							$conn->close();
						?>
						<br><p id='rp1' style='color: red;'></p><br>
						<label><b>Status </b></label>
						<input id="radio1" type="radio" name="status" value="open">Open
						<input id="radio2" type="radio" name="status" value="block">Block
						<br><p id='rp2' style='color: red;'></p><br>



						<fieldset align="center">
							<legend align="center"><h2>Users</h2></legend>
								<br>
							    <?php
							    	require("../Model/DbConnect.php");
							    	$sql = "SELECT * FROM users";

									$stmt = $conn->prepare($sql);
									$res = $stmt->execute();


									echo "<center>";
										echo "<table border='5'>";
											echo "<thead>";
												echo "<tr>";
													echo "<th>";
														echo "Username";
													echo "</th>";
													echo "<th>";
														echo "Firstname";
													echo "</th>";
													echo "<th>";
														echo "Surname";
													echo "</th>";
													echo "<th>";
														echo "Status";
													echo "</th>";
												echo "</tr>";
											echo "</thead>";
											echo "<tbody>";
									if ($res)
									{
										$data = $stmt->get_result();

										if ($data->num_rows > 0)
										{
											while ($row = $data->fetch_assoc())
											{
												echo "<tr>";
													echo "<td>";
														echo $row["username"];
													echo "</td>";
													echo "<td>";
														echo $row["firstname"];
													echo "</td>";
													echo "<td>";
														echo $row["surname"];
													echo "</td>";
													echo "<td>";
														echo $row["status"];
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
								?>
						</fieldset>
				</fieldset>

				<br>
				
				<center>
					<input type="submit" name="submit" value="Update">
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


<?php
	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$us = $_POST['users']; 

		if ($us == 'emp')
		{
			echo "Please select a user";
		}
		else if (!isset($_POST['status']))
		{
			echo "Please select a status";
		}
		else
		{
			$status = $_POST['status'];

			require("../Model/AccessUpdate.php");

			bind($us, $status);	
		}		
	}
?>