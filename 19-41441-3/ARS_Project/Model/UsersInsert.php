<?php

	function bind($un, $pw, $firstname, $surname, $em, $dob, $type, $status)
	{
		require("DbConnect.php");
		
		$sql = "INSERT INTO users (username, password, firstname, surname, email, dob, type, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssssssss", $un, $pw, $firstname, $surname, $em, $dob, $type, $status);
		$res = $stmt->execute();

		if ($res)
		{
			echo "Registration Successful!";
		}
		else
		{
			echo "Registration failed";
		}
		$conn->close();
	}
	
?>