<?php
	if($_SERVER['REQUEST_METHOD']==="POST"){
		$check=0;
		$name=$_POST['name'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		if(empty($name)){
			echo "Fill name";
			echo "<br><br>";
		}
		else{
			$name=sanitize($name);
		}
		if(empty($address)){
			echo "Fill up address properly";
			echo "<br><br>";
			

		}
		else{
			$address=sanitize($address);
			
		}
		if(empty($email)){
			echo "Fill up email properly";
			echo "<br><br>";
	

		}
		else{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				echo "Invalid email formate";
				echo "<br><br>";
				$check=1;
			}
			else{
				$email=sanitize($email);
			}
		}
		// session_start();
		// echo $_SESSION['uname'];
		if(!empty($name) && !empty($address) &&!empty($email)){
			if($check===1){
				echo "";
			}
			else
			{	
				session_start();
				require '../database.php';
				$sql = "UPDATE registration SET Name=?, Address=? ,Email=? WHERE UserName = ?";

				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ssss", $name,$address,$email,$uname);
				$name=$_POST['name'];
				$address=$_POST['address'];
				$email=$_POST['email'];
				$uname=$_SESSION['uname'];
				$res = $stmt->execute();
				if ($res) {
					echo "Profile updated successfully";
				}
				else {
					echo "Failed to update data";
				}
				$conn->close();
			}
		}
		
	}
	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	} 
  ?>