<?php

	function bind($us, $un, $pw, $firstname, $surname, $em, $dob, $type, $status)
	{
		require("DbConnect.php");
		
		$sql = "UPDATE users SET username = ?,password = ?,firstname = ?,surname = ?,email = ?,dob = ?,type = ?, status = ? WHERE username = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssssssss", $un, $pw, $firstname, $surname, $em, $dob, $type, $status, $us);
		$res = $stmt->execute();

		if ($res)
		{
			echo "Profile updated!";
		}
		else
		{
			echo "Profile could not be updated";
		}
		$conn->close();
	}
	
?>