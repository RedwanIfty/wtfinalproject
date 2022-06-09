<?php
	require '../database.php';
	$sql = "SELECT * FROM viewflight WHERE Carrier = ?";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $_GET['q']);
		$res=$stmt->execute();

		if($res){
			$data=$stmt->get_result();

			if($data->num_rows>0){
					echo "<table>";
					echo "<tr>";
					echo "<th>Flight</th>";
					echo "<th>Carrier</th>";
					echo "<th>Destination</th>";
					echo "<th>Departure</th>";
					echo "<th>Status</th>";
					echo "</tr>";
				while($row=$data->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row['Flight']."</td>";
					echo "<td>".$row['Carrier']."</td>";
					echo "<td>".$row['Destination']."</td>";
					echo "<td>".$row['Departure']."</td>";
					echo "<td>".$row['Status']."</td>";
					echo "</tr>";
				}
				 echo "</table>";
			}
			else{
				echo "No record found";
			}
		}

		$conn->close();
  ?>