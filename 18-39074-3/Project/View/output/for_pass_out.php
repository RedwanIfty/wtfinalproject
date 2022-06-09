<?php
    session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Output</title>
</head>
<body>
	<p>
		<?php 
		    if(isset($_SESSION['success'])){
		    	echo $_SESSION['success'];
		    }else{
		    	if(isset($_SESSION['failed'])){
		    		echo $_SESSION['failed'];
		    	}
		    }
		?>	
	</p>
	
	<label>Back to <a href="../signin.php" target="_self"><b>Signin Page</label>
</body>
</html>