<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "airline_reservation_system";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	// echo "Connection suc";
  ?>