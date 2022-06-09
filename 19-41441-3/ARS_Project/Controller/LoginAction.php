<?php
	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$un = $_POST['username'];
		$pw = $_POST['password'];

		if(empty($un))
		{
			echo "Enter the username";
		}
		else if(empty($pw))
		{
			echo "Enter the password";
		}
		else
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ars";

			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error)
			{
				die("Connection failed: " . $conn->connect_error);
			}
			$sql = "SELECT * FROM users WHERE username = ? and password = ?";

			$stmt = $conn->prepare($sql);
			$stmt->bind_param("ss", $un, $pw);
			$un = $_POST['username'];
			$pw = $_POST['password'];

			$res = $stmt->execute();

			$Valid = 0;
			$name = "";
			if ($res) 
			{
				$data = $stmt->get_result();
				if ($data->num_rows > 0)
				{
					$row = $data->fetch_assoc();
					if($row["type"]==="admin")
					{
						if($row["status"]==="open")
						{
							$Valid = 1;
							$name = $row["firstname"]." ".$row["surname"];
						}
						else
						{
							$Valid = 2;
						}
					}
				}
			}
			if($Valid == 1)
			{
				session_start();
				$_SESSION['name'] = $name;
				header("Location: ../View/Home.php");
			}
			else if($Valid == 2)
			{
				echo "This account is blocked!";
			}
			else
			{
				echo "Username or password is incorrect!";		
			}
		}
	}
?>