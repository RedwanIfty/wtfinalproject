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
		$un = $_POST['username'];
		$pw = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$firstname = $_POST['firstname'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];
		$dob = $_POST['dob'];

		if (empty($un))
		{
			echo "Username cannot be empty";
		}
		else if (empty($pw))
		{
			echo "Password cannot be empty";
		}
		else if (empty($cpassword))
		{
			echo "Confirm your password";
		}
		else if (empty($firstname))
		{
			echo "Please enter your first name";
		}
		else if (empty($surname))
		{
			echo "Please enter your surname";
		}
		else if (empty($email))
		{
			echo "Please enter your email";
		}
		else if (empty($dob))
		{
			echo "Please enter your date of birth";
		}
		else if(!isset($_POST['type']))
		{
			echo "Please select the type";
		}
		else if (strcmp($pw, $cpassword) != 0)
		{
			echo "Passwords don't match";
		}
		else
		{
			$type = $_POST['type'];
			$em = sanitize($_POST["email"]);
			$status = $_POST['status'];
			if (!filter_var($em, FILTER_VALIDATE_EMAIL))
			{	
			  $emailErr = "Invalid email format";
			  echo $emailErr;
			}
			else
			{
				require("../Model/DbConnect.php");
			
				$sql = "SELECT * FROM users WHERE username = ?";

				$stmt = $conn->prepare($sql);
				$stmt->bind_param("s", $un);
				$res = $stmt->execute();
				$isValid = 0;
				
				if ($res) 
				{
					$data = $stmt->get_result();

					if ($data->num_rows > 0) 
					{
						$isValid = 1;
					}
				}
				else 
				{
					$isValid = 2;
					echo "Error while executing the statement";
				}
				$conn->close();
				if($isValid == 1)
				{
					echo "Username already exists!";
				}
				else if($isValid == 0)
				{
					require("../Model/UsersInsert.php");

					bind($un, $pw, $firstname, $surname, $em, $dob, $type, $status);
				}					
			}
		}
	}
	function sanitize($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>