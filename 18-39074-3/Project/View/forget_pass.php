<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/forget_pass.js" defer></script>
	<title>Forget Password</title>
</head>
<body>
	<form name="registration" action="../Controller/forget_passAction.php" method="POST" onsubmit="return validation(this);">
		<table>			
			<tr>
				<td>Enter User_Name</td>
				<td>
					<input type="text" name="username" id="username" placeholder="Enter User Name Here"><br>
					<span id="userErr"></span>
					<?php if(isset($_COOKIE["userErr"])) { 
						echo $_COOKIE["userErr"]; 
					  }
					?>
				</td>
			</tr>
			<tr>
				<td>Enter New Password</td>
				<td>
					<input type="password" name="pass" id="pass" placeholder="Enter Password Here" onInput="checkpassword()"><br>
					<span id="passErr"></span>
					<?php if(isset($_COOKIE["passErr"])) { 
						echo $_COOKIE["passErr"]; 
					  }
					?>
				</td>
			</tr>
			<tr>
				<td>Enter New Confirm Password</td>
				<td>
					<input type="password" name="cpass" id="cpass" placeholder="Enter Confirm Password "><br>
					<span id="cpassErr"></span>
					<?php if(isset($_COOKIE["cpassErr"])) { 
						echo $_COOKIE["cpassErr"]; 
					  }
					?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="reset" name="clear" value="Clear Form">
					<input type="submit"class="button" name="submit" id="submit" value="Update">
				</td>
			</tr>			
		</table>		
	</form>
</body>
</html>