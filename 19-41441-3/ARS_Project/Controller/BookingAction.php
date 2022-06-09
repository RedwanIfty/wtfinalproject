<?php
	session_start();
	if(count($_SESSION) === 0)
	{
		header("Location: ../Controller/Logout.php");
	}
?>

<?php
	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$us = $_POST['users'];
		$flightno = $_POST['flightnos'];
		$flights = "";
		$date = "";
		$departure = "";
		$arrival = "";


		if($flightno == 'emp')
		{
			echo "Select the flight";
		}
		else
		{
			require("../Model/DbConnect.php");
			
			$sql = "SELECT * FROM flights WHERE flightno = ?";

			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $flightno);
			$res = $stmt->execute();
			$isValid = 0;
			
			if ($res) 
			{
				$data = $stmt->get_result();

				if ($data->num_rows > 0) 
				{
					while ($row = $data->fetch_assoc())
					{
						$flights = $row["flightname"]." ".$flightno;
						$date = $row["date"];
						$departure = $row["departure"];
						$arrival = $row["arrival"];
						$isValid = 1;
						break;
					}
				}
			}
			
			$conn->close();

			if($isValid == 1)
			{
				require("../Model/BookingsInsert.php");

				bind($us, $flights, $date, $departure, $arrival);
			}
			else 
			{
				echo "Error while executing the statement";
			}
		}

	}
?>