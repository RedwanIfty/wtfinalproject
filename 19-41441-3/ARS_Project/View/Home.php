<?php
	session_start();
	if(count($_SESSION) === 0)
	{
		header("Location: ../Controller/Logout.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" href="CSS/homecss.css">
	<link rel="stylesheet" href="CSS/header.css">
	<link rel="stylesheet" href="CSS/footercss.css">
</head>
<body>
	<header>
		<div class="banner">
			<div class="navbar">
				<label id="logo"><i><b>Safe Escape</b></i></label>
				<ul>
					<li><a href="Home.php">Home</a></li>
					<li><a href="RegistrationOption.php">Profiles</a></li>
					<li><a href="RestrictAccess.php">Restrict Access</a></li>
					<li><a href="Scheduling.php">Airlines Scheduling</a></li>
					<li><a href="Booking.php">Bookings</a></li>
					<li><a href="Search.php">Search</a></li>
					<li><a href="../Controller/Logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</header>
	
	<h1><p id="welc">Welcome, <?php echo $_SESSION['name']; ?></p></h1>
	<hr><hr>
	<div id="cont">
		<h3>About Us</h3>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ullamcorper, tortor at vestibulum imperdiet, magna velit sagittis libero, eu euismod massa risus in mauris. Cras at faucibus libero, nec facilisis sapien. Donec vel porttitor nisi. In erat elit, mattis et tincidunt at, sollicitudin non dolor. Sed nec justo vitae dui ornare sodales eget vel lorem. Integer egestas est est, eu aliquet turpis egestas ac. In in lobortis nulla. Praesent quis nunc luctus, suscipit ex ut, porta mauris. Nullam at sapien lorem. Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.

			Sed sapien tellus, dignissim at risus eget, luctus bibendum velit. Etiam in orci nec enim tristique vestibulum sed at nunc. Aliquam imperdiet libero ut dolor efficitur ultrices. Morbi et dictum orci. Ut sapien nisl, aliquam vitae faucibus sit amet, sollicitudin eget elit. Sed nec condimentum lectus. Sed elementum convallis ex. Donec enim ex, egestas eu metus eu, aliquam fringilla neque. In vulputate eros id orci blandit, hendrerit facilisis ex efficitur. Sed gravida eros eros, eu semper nibh mattis id. Nunc varius velit tellus. Mauris suscipit augue a risus pellentesque, ac fermentum dui cursus.
		</p>
	</div>
	
	<footer>
		<label><b>Number of Logins (Last 24 hours): <?php echo $_COOKIE[$_SESSION['user']] ?></b></label>
		<div id="foots">
			<h4>Hotline 18992, +99 04552881352 Reservation +88017865434-953</h4>
			<h4>© 2021 Airlines Reservation. All rights reserved.</h4>
		</div>
	</footer>
</body>
</html>