<?php
    session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/output.css">
	<title>Output</title>
</head>
<body>
	<div class="main">
		<div class="b">
	<p class="p">
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
	<label class="p2">Back to <a class="two" href="../signin.php" target="_self">Signin Page</a> or <a class="two" href="../index.php" target="_self">Home Page</a></label>
    </div>
    </div>
</body>
</html>