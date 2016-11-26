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

	
	<!--<style>
	
	img {
		width: 50%;
	}
	
	</style>-->



</head>

<body>
	<section id = "home" class="center">
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
		<div>
			<h2>Equipment</h2>
		</div>
		<div class="grid-row">
			<div class = "grid-col-5of10">

				<img class="equipImg" src= "img/camera.jpg">

			</div>
			<div class = "grid-col-5of10">

				
				<div class="equipPara">
					<h3>Description:</h3>
					<p>Focal length 28mm-112mm. Aperture f1.8-2.5. 10 megapixel. 720p HD video.
						SD Memory Card (SDHC/SDXC compatible). Must complete still camera operation quiz.</p>
					<h3>Rental Duration: 2 days</h3>
					<h3>Classes used in:</h3>
					<p>Iat 202, Iat 344, Iat 443</p>
					<h3>Available: 10/26</h3>
				</div>


				<a class="button" href="booking.php">Book Now</a>

			</div>	
		</div>
	</section>
</body>

</html>