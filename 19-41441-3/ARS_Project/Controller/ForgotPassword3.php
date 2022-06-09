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
	<script src="JS/ForgotPassword3Js.js"></script>
</head>
<body>
	<form name="fp3_js" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
			<br><br><br><br><br><br><br><br><br><br>

			<fieldset>
				<legend align="center"><h1>Forgot password</h1></legend>
				<fieldset align="center">
					<br>					
				    <label align="center">New Password </label>
					<input type="password" name="npassword" align="center">
					<br><p id='rp1' style='color: red;'></p><br>

					<label align="center">Confirm Password </label>
					<input type="password" name="cpassword" align="center">
					<br><p id='rp2' style='color: red;'></p><br>

					<?php
						if($_SERVER['REQUEST_METHOD'] === "POST")
						{
							$npassword = $_POST['npassword'];
							$cpassword = $_POST['cpassword'];

							if(empty($npassword))
							{
								echo "Enter your new password";
							}
							else if(empty($cpassword))
							{
								echo "Confirm your password";
							}
							else if (strcmp($npassword, $cpassword) != 0)
							{
								echo "Passwords don't match";
							}
							else
							{
								require("../Model/PasswordUpdate.php");

								bind($_SESSION['em'], $npassword);
							}
						}
					?>

				</fieldset>
				
				<br>
				
				<center>
					<input type="submit" name="submit" value="Change">
					<br><br>
				</center>
			
			</fieldset>
			<br><br>
		</form>
</body>
</html>