<?php 
	if($_SERVER['REQUEST_METHOD']==="POST"){
		$uname=$_POST['uname'];
		$npassword=$_POST['npassword'];
		$rpassword=$_POST['rpassword'];
		if(empty($uname)){
			echo "Fill user name";
			echo "<br><br>";
		}
		else
		{
			$uname=sanitize($uname);
		}
		if(empty($npassword)){
			echo "Fill new password";
			echo "<br><br>";
		}
		else{
			if(trim(strlen($npassword))<8){
				echo "Password at least 8 characters";
				echo "<br><br>";

			}
			else{
				$npassword=sanitize($npassword);
			}
		}
		if(empty($rpassword)){
			echo "Re-enter password";
			echo "<br><br>";
			}
		else{
			if($npassword!=$rpassword){
				echo "Password do not match";
				echo "<br><br>";	
			}
			else{
				$rpassword=sanitize($rpassword);
			}	
		}
		if(!empty($uname) and !empty($npassword) and !empty($rpassword)){
			if(trim(strlen($npassword))<8 || $npassword!=$rpassword){
				echo "invalid";
			}
			else{
				require '../database.php';
				$sql = "UPDATE registration SET Password = ?, ConfirmPassword = ? WHERE UserName = ?";

					$stmt = $conn->prepare($sql);
					$stmt->bind_param("sss", $npassword, $rpassword, $username);
					$npassword=$_POST['npassword'];
					$rpassword =$_POST['rpassword'] ;
					$username = $_POST['uname'];
					$res = $stmt->execute();
					if ($res) {
						echo "New pass updated successfully";
					}
					else {
						echo "user name is not match";
					}


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