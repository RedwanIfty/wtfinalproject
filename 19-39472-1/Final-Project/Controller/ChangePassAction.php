<?php 
	if($_SERVER['REQUEST_METHOD']==="POST"){
		$uname=$_POST['uname'];
		$currpass=$_POST['currpassword'];
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
		if(empty($currpass)){
			echo "Fill current password";
			echo "<br><br>";
		}
		else{
			$currpass=sanitize($currpass);
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
	// 	if(!empty($uname) and !empty($npassword) and !empty($rpassword)){
	// 		if(trim(strlen($npassword))<8 || $npassword!=$rpassword){
	// 			echo "invalid";
	// 		}
	// 		else{
	// 			require '../database.php';
	// 			$sql = "UPDATE registration SET Password = ?, ConfirmPassword = ? WHERE UserName = ?";

	// 				$stmt = $conn->prepare($sql);
	// 				$stmt->bind_param("sss", $npassword, $rpassword, $username);
	// 				$npassword=$_POST['npassword'];
	// 				$rpassword =$_POST['rpassword'] ;
	// 				$username = $_POST['uname'];
	// 				$res = $stmt->execute();
	// 				if ($res) {
	// 					echo "New pass updated successfully";
	// 				}
	// 				else {
	// 					echo "user name is not match";
	// 				}


	// 		}
	// 	}
		if(!empty($uname) and !empty($currpass) and !empty($npassword) and !empty($rpassword)){
			if(trim(strlen($npassword))<8 || $npassword!=$rpassword){
				echo " ";
			}
			else{
				require '../database.php';
				$sql = "SELECT * FROM registration WHERE UserName = ? and Password = ?";

				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ss", $username, $password);
				$username = $_POST['uname'];
				$password = $_POST['currpassword'];
				$res = $stmt->execute();

				if ($res) {
					$data = $stmt->get_result();

					if ($data->num_rows > 0) {
						while ($row = $data->fetch_assoc()) {
							$sql1 = "UPDATE registration SET Password = ?, ConfirmPassword = ? WHERE UserName = ?";

								$stmt1 = $conn->prepare($sql1);
								$stmt1->bind_param("sss", $npassword, $rpassword, $username);
								$npassword=$_POST['npassword'];
								$rpassword =$_POST['rpassword'] ;
								$username = $_POST['uname'];
								$res1 = $stmt1->execute();
								if ($res1) {
									echo "Password changed successfully";
								}
								else {
									echo "user name is not match";
								}
						}
					}
					else {
						echo "No records found";
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