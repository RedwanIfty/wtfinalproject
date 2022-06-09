<?php 
	if($_SERVER['REQUEST_METHOD']==="POST"){
		$flightno=$_POST['flightno'];
		$pname=$_POST['pname'];
		$address=$_POST['address'];
		$flightname=$_POST['flightname'];
		$sfrom=$_POST['sfrom'];
		$destination=$_POST['destination'];
		$dtimedate=$_POST['dtimedate'];
		if(empty($flightno)){
			echo "Fill flight no";
			echo "<br><br>";
		}
		else{
			$flightno=sanitize($flightno);
		}
		if(empty($pname)){
			echo "Fill Passenger name";
			echo "<br><br>";
		}
		else{
			$pname=sanitize($pname);
		}
		if(empty($address)){
			echo "Fill address";
			echo "<br><br>";
		}
		else{
			$address=sanitize($address);
		}
		if(empty($flightname)){
			echo "Fill flight name";
			echo "<br><br>";
		}
		else{
			$flightname=sanitize($flightname);
		}
		if(empty($sfrom)){
			echo "Fill starting place";
			echo "<br><br>";
		}
		else{
			$sfrom=sanitize($sfrom);
		}
		if(empty($destination)){
			echo "Fill destination";
			echo "<br><br>";
		}
		else{
			$destination=sanitize($destination);
		}
		if(empty($dtimedate)){
			echo "Fill time and date properly";
			echo "<br><br>";
		}
		else{
			$dtimedate=sanitize($dtimedate);
		}
		if(!empty($flightno) && !empty($pname) && !empty($address) && !empty($flightname) && !empty($sfrom) && !empty($destination) && !empty($dtimedate)){
			require '../database.php';
			$sql = "INSERT INTO flightbooking (FlightNo,PassengerName,Address,FlightName,StartFrom,Destination,FlightDateTime) VALUES (?, ?, ?, ?, ?, ?, ?)";

			$stmt = $conn->prepare($sql);
			$stmt->bind_param("issssss", $flightno,$pname,$address,$flightname,$sfrom,$destination,$dtimedate);
			$flightno=$_POST['flightno'];
			$pname=$_POST['pname'];
			$address=$_POST['address'];
			$flightname=$_POST['flightname'];
			$sfrom=$_POST['sfrom'];
			$destination=$_POST['destination'];
			$dtimedate=$_POST['dtimedate'];
			$res = $stmt->execute();
			if ($res) {
				echo "Flight booking successful";
			}
			else {
				echo "Failed to book flight ";
			}

		}
	}
	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	} 
 ?>