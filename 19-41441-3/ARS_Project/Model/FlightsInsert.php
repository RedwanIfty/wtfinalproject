<?php

	function bind($flights, $flightno, $fairports, $tairports, $date, $departure, $arrival)
	{
		require("DbConnect.php");
		
		$sql = "INSERT INTO flights (flightname, flightno, fairports, tairports, date, departure, arrival) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssssss", $flights, $flightno, $fairports, $tairports, $date, $departure, $arrival);
		$res = $stmt->execute();

		if ($res)
		{
			echo "Flight Added!";
		}
		else
		{
			echo "Failure!";
		}
		$conn->close();
	}
	
?>