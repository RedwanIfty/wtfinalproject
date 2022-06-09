<?php
	require '../database.php';
	$sql = "SELECT * FROM flightbooking WHERE PassengerName like ?";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $_GET['q']);
		$res=$stmt->execute();

		if($res){
			$data=$stmt->get_result();

			if($data->num_rows>0){
					echo "<table>";
					echo "<tr>";
					echo "<th>Flight No</th>";
					echo "<th>Passenger Name</th>";
					echo "<th>Address</th>";
					echo "<th>Flight Name</th>";
					echo "<th>Start From</th>";
					echo "<th>Destination</th>";
					echo "<th>Flight Date and Time</th>";
					echo "</tr>";
				while($row=$data->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row['FlightNo']."</td>";
					echo "<td>".$row['PassengerName']."</td>";
					echo "<td>".$row['Address']."</td>";
					echo "<td>".$row['FlightName']."</td>";
					echo "<td>".$row['StartFrom']."</td>";
					echo "<td>".$row['Destination']."</td>";
					echo "<td>".$row['FlightDateTime']."</td>";
					
					echo "</tr>";
				}
				 echo "</table>";
			}
			else{
				echo "<h1>No record found</h1>";
			}
		}
		$conn->close();
  ?>