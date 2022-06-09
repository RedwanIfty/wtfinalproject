<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forgotten password</title>
	<script src="JS/ForgotPasswordJs.js"></script>
</head>
<body>
	<form name="fp_js" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
			<br><br><br><br><br><br><br><br><br><br>

			<fieldset>
				<legend align="center"><h1>Forgot password</h1></legend>
				<fieldset align="center">
					<br>					
				    <label align="center">Enter your username </label>
					<input type="text" name="username" align="center">
					<br><p id='rp1' style='color: red;'></p><br>

					<?php
						if($_SERVER['REQUEST_METHOD'] === "POST")
						{
							$us = $_POST['username'];

							if(empty($us))
							{
								echo "Username cannot be empty";
							}
							else
							{

								require("../Model/DbConnect.php");

								$sql = "SELECT * FROM users WHERE username = ?";

								$stmt = $conn->prepare($sql);
								$stmt->bind_param("s", $us);
								$res = $stmt->execute();
								$isValid = false;
								$em = "";
								$status = "";

								if ($res)
								{
									$data = $stmt->get_result();
									if ($data->num_rows > 0)
									{
										$row = $data->fetch_assoc();
										$em = $row["email"];
										$status = $row["status"];
										$isValid = true;
									}
								}
								else
								{
									echo "Error while executing the statement";
								}

								if($isValid)
								{
									session_start();
									$_SESSION['nm'] = $us;
									$_SESSION['em'] = $em;
									$_SESSION['status'] = $status;
									header("Location: ForgotPassword2.php");
								}
								else
								{
									echo "User does not exist!";			
								}
								$conn->close();
							}
						}
					?>

				</fieldset>
				
				<br>
				
				<center>
					<input type="submit" name="submit" value="Submit">
					<br><br>
				</center>
			
			</fieldset>
			<br><br>
		</form>
</body>
</html>