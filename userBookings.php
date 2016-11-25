<!doctype html>
<html lang="en">

<head>
	<!--home page for the site-->
	<!--import and linking of css and set html standards-->

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Booking Home</title>
	<!-- <link rel="stylesheet" href="css/normalize.css"> -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/items.css">




</head>

<body>
	<section id = "home" class="center grid-row">
		<div class="banner">
			<h1>Sfu Surrey Equipment Booking</h1>
			
		</div>

		<div class="dropdown">
			<button onclick="dropDown()" class="dropbtn">
				<!-- get the value of the username parameter from the url and display it -->
				<?php 
				echo $_GET['username']; 
				?>
				
			</button>
			<div id="myDropdown" class="dropdown-content">
				<a href="userBookings.php">My Bookings</a>
				<a href="logout.php">Logout</a>
				
			</div>
		</div>

		<h2>My Bookings</h2>

		<div class="scrollAreaUser">
			<div class = "single-item">
				<div class = "img-frame">
					<img src = "img/camera.jpg">
				</div>

				<div class = "item-desc">
					<p>Booked: Nov 25</p>
					<p>Due: Nov 28, 12pm</p>
					<a class="button" href="#">Cancel Booking</a>
				</div>
				
					
				
			</div>
		</div>

	</section>
	<script type="text/javascript" src="js/dropdown.js"></script>
</body>

</html>