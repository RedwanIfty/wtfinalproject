<?php

	function bind($us, $status)
	{
		require("DbConnect.php");
		
		$sql = "UPDATE users SET status = ? WHERE username = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss", $status, $us);
		$res = $stmt->execute();

		if ($res)
		{
			echo "Status updated!";
		}
		else
		{
			echo "Failure!";
		}
		$conn->close();
	}
	
?>