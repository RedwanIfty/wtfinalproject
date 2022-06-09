<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Password</title>
	<script type="text/javascript" src="js/change.js"></script>
	<link rel="stylesheet" type="text/css" href="css/changepass.css">
</head>
<body>
<h1 align="middle">Welcome to Change Password page</h1>
<form action="../Controller/ChangePassAction.php" method="POST" onsubmit="sendData(this);return false;">
<fieldset>
	<div class="align">
		*User Name:
		<input type="text" name="uname"><b id="uname" class="red"></b>
		<br><br>
		*Current Password:
		<input type="password" name="currpassword"><b id="currpass" class="red"></b>
		<br><br>
		*New Password:
		<input type="password" name="npassword"><b id="npass" class="red"></b>
		<br><br>
		*Re Enter Password:
		<input type="password" name="rpassword"><b id="rpass" class="red"></b>
		<br><br>
		<input type="submit" name="confirm" value="confirm">
		
		<br><br>
	</div>
	<b id="res"></b>
	<p><a href="Login.php">Click here </a> to log in</p>
</body>
</html>
<?php include 'footer.php' ?>