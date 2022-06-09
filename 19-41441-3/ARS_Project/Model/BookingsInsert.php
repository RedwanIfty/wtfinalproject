<?php

	function bind($us, $flights, $date, $departure, $arrival)
	{
		require("DbConnect.php");
		
		$sql = "INSERT INTO bookings (username, flightname, date, departure, arrival) VALUES (?, ?, ?, ?, ?)";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssss", $us, $flights, $date, $departure, $arrival);
		$res = $stmt->execute();

		if ($res)
		{
			echo "Booking Successful!";
		}
		else
		{
			echo "Booking failed";
		}
		$conn->close();
	}
	
?>