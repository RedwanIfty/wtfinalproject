<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forget Password</title>
	<script type="text/javascript" src="js/forget.js"></script>
	<link rel="stylesheet" type="text/css" href="css/forget.css">
</head>
<body>
<h1 align="middle">Welcome to Forget Password page</h1>
<form action="../Controller/ForgetAction.php" method="POST" onsubmit="sendData(this);return false;">
<fieldset>
	*User Name:
	<input type="text" name="uname"><b id="uname" class="red"></b>
	<br><br>
	*New Password:
	<input type="password" name="npassword"><b id="npass" class="red"></b>
	<br><br>
	*Re Enter Password:
	<input type="password" name="rpassword"><b id="rpass" class="red"></b>
	<br><br>
	<input type="submit" name="confirm" value="confirm">
	
	<br><br>
	<b id="res"></b>
	<p><a href="Login.php">Click here </a> to log in</p>
</body>
</html>
<?php include 'footer.php' ?>