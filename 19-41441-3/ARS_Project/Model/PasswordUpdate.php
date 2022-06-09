<?php

	function bind($em, $pw)
	{
		require("DbConnect.php");
		
		$sql = "UPDATE users SET password = ? WHERE email = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss", $pw, $em);
		$res = $stmt->execute();

		if ($res)
		{
			header("Location: ../Controller/Logout.php");
		}
		else
		{
			echo "Password was not updated";
		}
		$conn->close();
	}
	
?>