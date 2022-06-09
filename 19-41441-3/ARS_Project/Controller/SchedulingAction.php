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
		$flights = $_POST['flights'];
		$flightno = $_POST['flightno'];
		$fairports = $_POST['fairports'];
		$tairports = $_POST['tairports'];
		$date = $_POST['date'];
		$departure = $_POST['departure'];
		$arrival = $_POST['arrival'];

		if ($flights=='emp')
		{
			echo "Flight name needs to be mentioned";
		}
		else if (empty($flightno))
		{
			echo "Flight number is necessary";
		}
		else if ($fairports=='emp')
		{
			echo "Please enter departing airport";
		}
		else if ($tairports=='emp')
		{
			echo "Please enter arriving aiport";
		}
		else if (empty($date))
		{
			echo "Please enter departure date";
		}
		else if (empty($departure))
		{
			echo "Please enter departure time";
		}
		else if (empty($arrival))
		{
			echo "Please enter arrival time";
		}
		else if(strcmp($fairports, $tairports) == 0)
		{
			echo "Please choose different airports";
		}
		else
		{
			require("../Model/FlightsInsert.php");

			bind($flights, $flightno, $fairports, $tairports, $date, $departure, $arrival);		
		}
	}
?>