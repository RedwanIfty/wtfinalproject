<?php 
	if($_SERVER['REQUEST_METHOD']==="POST"){
		$uname=$_POST['uname'];
		$password=$_POST['password'];
		if(empty($uname)){
			echo "Username is required";
			echo "<br><br>";
		}
		if(empty($password)){
			echo "Password is required";
			echo "<br><br>";
		}
		if(!empty($uname) and !empty($password)){
			require '../database.php';
			$sql="SELECT * FROM registration WHERE UserName = ? and Password =? ";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param("ss",$uname,$password);
				$uname=$_POST['uname'];
				$password=$_POST['password'];

				$res=$stmt->execute();

				if($res){
					$data=$stmt->get_result();
					if($data->num_rows>0){
						while ($row = $data->fetch_assoc()) {
								if(isset($_POST['remember'])){
						 	setcookie('uname',$_POST['uname'],time()+60*60*24);
						 	setcookie('password',$_POST['password'],time()+60*60*24);
						 		
						}
						session_start();
						$_SESSION['uname']=$_POST['uname'];
						 header("location:../View/welcome.php");
							}
						}
						else{
							echo  "Wrong username or password";
						}
				}

				$conn->close();
		}
	}
 ?>