<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<script type="text/javascript" src="js/login.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<h1 align="middle">Welcome to log in page</h1>
<form name="jsForm" action="../Controller/LoginAction.php" method="POST" onsubmit="return isValid(this) ;">
<fieldset>
	*User Name:
	<input type="text" name="uname"><b id="uname" class="red"></b>
	<br><br>
	*Password:
	<input type="password" name="password"><b id="pass" class="red"></b>
	<br><br>
	<input type="checkbox" name="remember">remember
	<br><br>
	
	<input type="submit" name="login" value="login">
	<br><br>
	<p><b>Not yet register?</b><a href="Registration.php">click here</a><b> to register</b></p>
	<p><b>Forgot password?</b><a href="Forget.php">click here</a><b>to reset</b></p>
	<p><b>Change password?</b><a href="ChangePass.php">click here</a><b>to Change password</b></p>
</fieldset>
</form>
</body>
</html>

<?php require'footer.php' ?>