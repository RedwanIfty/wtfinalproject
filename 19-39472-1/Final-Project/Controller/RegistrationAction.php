<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$check=0;
		$name=$_POST['name'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$jdate=$_POST['joinningdate'];
		$post=$_POST['post'];
		$uid=$_POST['uid'];
		$uname=$_POST['uname'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		if(empty($name)){
			echo "Fill up name properly";
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
		if(empty($gender)){
			echo "Select gender";
			echo "<br><br>";
		}
		else
		{
			$gender=sanitize($gender);
		}
		if(empty($jdate)){
			echo "Select joinning date";
			echo "<br><br>";
		}
		else{
			$jdate=sanitize($jdate);
		}
		if(empty($post)){
			echo "Fill up your post";
			echo "<br><br>";
		}
		else{
			$post=sanitize($post);
		}
		if(empty($uname)){
			echo "Fill up your username";
			echo "<br><br>";
		}
		else{
			$uname=sanitize($uname);
		}
		if(empty($uid)){
			echo "Fill up your uid";
			echo "<br><br>";
		}
		else{
			$uid=sanitize($uid);
		}
		if(empty($password)){
			echo "Fill password";
			echo "<br><br>";
		}
		else
		{
			if(trim(strlen($password))<8){
				echo "Password at least 8 characters";
				echo "<br><br>";
			}
			else
			{
				$password=sanitize($password);
			}
		}
		if(empty($cpassword)){
			echo "Fill confirm password";
			echo "<br><br>";
			}
		else{
			if($password!=$cpassword){
				echo "Password do not match";
				echo "<br><br>";	
			}
			else{
				$cpassword=sanitize($cpassword);
			}	
		}
		if(!empty($name) && !empty($address) && !empty($email) && !empty($gender) && !empty($jdate) && !empty($post) && !empty($uid) && !empty($uname) && !empty($password)&& !empty($cpassword)){
			if($check==1 || $password!=$cpassword ||trim(strlen($password))<8){
				echo "";
			}
			else 
			{
				require '../database.php';
				$sql="SELECT * FROM registration WHERE UserName = ? OR Email =? ";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param("ss",$uname,$email);
				$uname=$_POST['uname'];
				$email=$_POST['email'];

				$res=$stmt->execute();

				if($res){
					$data=$stmt->get_result();
					if ($data->num_rows === 0){

						$sql1 = "INSERT INTO registration (Name,Address,Email,Gender,JoinningDate,Post,UserId,UserName,Password,ConfirmPassword) VALUES (?,?,?,?,?,?,?,?,?,?)";

						$stmt1 = $conn->prepare($sql1);
						 $stmt1->bind_param("ssssssssss",$name,$address,$email,$gender,$jdate,$post,$uid,$uname,$password,$cpassword );
						 $name=$_POST['name'];
						 $address=$_POST['address'];
						 $email=$_POST['email'];
						 $gender=$_POST['gender'];
						 $jdate=$_POST['joinningdate'];
						 $post=$_POST['post'];
						 $uid=$_POST['uid'];
						 $uname=$_POST['uname'];
						 $password=$_POST['password'];
						 $cpassword=$_POST['cpassword'];
						$res1 = $stmt1->execute();
						if ($res1) {
							echo "Registration successful";
						}
						else {
							echo "Registration Failed";
					 	}
					}
					else{
						echo "User name or email is already exitsed";
					}
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