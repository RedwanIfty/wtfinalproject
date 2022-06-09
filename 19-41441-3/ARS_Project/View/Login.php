<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sign-in</title>
		<link rel="stylesheet" href="CSS/login.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="JS/LoginJs.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="main">
				<div class="header">
					<h1>Sign in</h1>
				</div>
				<form name="js_login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
				    <span>
				    	<i class="fa fa-user"></i>
				    	<input type="text" placeholder="Username" name="username" align="center">
				    </span>
				    <p id="lp1" style="color: red;"></p>
				    <br>
					<span>
						<i class="fa fa-lock"></i>
						<input type="password" placeholder="Password" name="password">
					</span>
					<p id="lp2" style="color: red;"></p>
					<br>


					<a href="../Controller/ForgotPassword.php"><b>Forgotten password?</b></a>
					<br><br>
					<button id="btn1">Sign-in</button>
					
					<br><br>
				</form>
			</div>	
		</div>
	</body>
</html>

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
			$unique = "";
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
							$unique = $row["username"];
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
				$_SESSION['user'] = $unique;
				$_SESSION['user2'] = $unique."2";
				$_SESSION['name'] = $name;
				if(!isset($_COOKIE[$_SESSION['user']]))
				{
					setcookie($_SESSION['user2'], 0, time() + 86400);
				    setcookie($_SESSION['user'], 1, time() + 86400);
				}
				else if(!isset($_COOKIE[$_SESSION['user2']]))
				{
					setcookie($_SESSION['user2'], 0, time() + 86400);
					setcookie($_SESSION['user'], 1, time() - 1);
					setcookie($_SESSION['user'], 1, time() + 86400);
				}
				else
				{
					setcookie($_SESSION['user'], $_COOKIE[$_SESSION['user']] + 1, time() + 86400);
				}
				header("Location: ../View/Home.php");
			}
			else if($Valid == 2)
			{
				echo "<script>";
					echo "document.getElementById('lp2').innerHTML = 'This account is blocked!';";
				echo "</script>";
			}
			else
			{
				echo "<script>";
					echo "document.getElementById('lp2').innerHTML = 'Username or password is incorrect!';";
				echo "</script>";	
			}
		}
	}
?>