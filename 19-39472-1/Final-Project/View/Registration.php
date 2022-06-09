<?php 

include '../database.php';
$sql = "SELECT * FROM registration ORDER BY UserId DESC LIMIT 1";

$stmt = $conn->prepare($sql);
$res = $stmt->execute();

if ($res) {
	$data = $stmt->get_result();
	if($data->num_rows===0)
	{
		$emp="E-001";
	}
	if ($data->num_rows === 1) {
		while ($row = $data->fetch_assoc()) {
			$lastid=$row['UserId'];	
			$emp=substr($lastid, 4);
			$emp=intval($emp)+1;
			$emp="E-00".$emp;

		}
	}
}
else {
	echo "Error while executing the statement";
}

$conn->close();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
<!-- 	<style>
	body {
 		 background-image: url("Plane.PNG");
 		 background-repeat: no-repeat;
 		 background-color: deepskyblue;
  		background-size: cover;
  		//position: fixed;
  		
}
	</style>

 -->
 <link rel="stylesheet" type="text/css" href="css/registration.css">
 <script type="text/javascript" src="js/registration.js"></script>
</head>
<body>
	<h1>Welcome to Registration Page</h1>
	<b class="c1">Already registered ?</b>
	<br><br>
	<a href="Login.php">click here</a><b> to login</b>
	<br><br>
	<h2>Fill up registration  form</h2>
	<form  action="../Controller/RegistrationAction.php" method="POST" onsubmit="sendData(this);return false;">
		<fieldset>
			<b>*Name:</b>
			<input type="text" name="name"><b id="name" class="red"></b>
			<br><br>
			<b>*Address:</b>
			<input type="text" name="address" placeholder="address"><b id="address" class="red"></b>
			<br><br>

			<b>*Email:</b>
			<input type="text" name="email"><b id="email" class="red"></b>
			<br><br>
			
			<b>*Gender:</b>
			<input type="radio" name="gender" value="male" checked>Male
			
			<input type="radio" name="gender" value="female">Female
			
			<input type="radio" name="gender" value="others">Others
			
			<br><br>

			<b>*Joinning Date:</b>
			<input type="date" name="joinningdate">	<b id="jdate" class="red"></b>
			<br><br>
			<b>*Post:</b>
			<select name="post" id="post"><b id="post"></b>
				<option value="">Select post</option>
				<option value="gateagent">Gate agent</option>
				<option value="customerServiceRepresentative">Customer Service Representative</option>
			</select> <b id="post1" class="red"></b>
			<br><br>
			<b>*User Id:</b>
			<input type="text" name="uid" readonly  value="<?php echo $emp ?>">
			<br><br>
			<b>*User Name:</b>
			<input type="text" name="uname"><b id="uname" class="red"></b>
			<br><br>
			<b>*Password :</b>
			<input type="Password" name="password"><b id="pass" class="red"></b>
			<br><br>
			<b>*Confirm Password :</b>
			<input class="form" type="Password" name="cpassword"><b id="cpass" class="red"></b>
			<br><br>
			<input class="registerbtn" type="submit" name="Register" value="register">
			<br><br>	
		</fieldset>

		<p id="res"></p>
		<p id="process"></p>
	</form>
	<?php include 'footer.php' ?>
</body>
</html>
