<?php
	session_start();
	if(count($_SESSION) === 0)
	{
		header("Location: ../Controller/Logout.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forgotten password</title>
	<script src="JS/ForgotPassword2Js.js"></script>
</head>
<body>
	<form name="fp2_js" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
			<br><br><br><br><br><br><br><br><br><br>

			<fieldset>
				<legend align="center"><h1>Forgot password</h1></legend>
				<fieldset align="center">
					<br>					
				    <label align="center">Enter your email </label>
					<input type="email" name="email" align="center">
					<br><p id='rp1' style='color: red;'></p><br>

					<?php
						if($_SERVER['REQUEST_METHOD'] === "POST")
						{
							$email = $_POST['email'];

							if(empty($email))
							{
								echo "Email cannot be empty";
							}
							else
							{
								$isValid = 0;

								if($_SESSION['em'] === $email)
								{
									if($_SESSION['status'] === "open")
									{
										$isValid = 1;	
									}
									else
									{
										$isValid = 2;
									}
								}
								if($isValid == 1)
								{
									session_start();
									header("Location: ForgotPassword3.php");
								}
								else if($isValid == 2)
								{
									echo "This account is blocked!";		
								}
								else
								{
									echo "Email does not match!";
								}
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