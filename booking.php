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
	<link rel="stylesheet" href="css/tcal.css">
	<link rel="stylesheet" href="css/main.css">
	<script type="text/javascript" src="js/tcal.js"></script>
<!--   <link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/fonts.css">  -->



</head>

<body>
	<section id = "booking" class="center">
		<div class="banner">
			<h1>Sfu Surrey Equipment Booking</h1>
			
		</div>
		<div class="dropdown">
			<button onclick="dropDown()" class="dropbtn">User</button>
			<div id="myDropdown" class="dropdown-content">
				<a href="userBookings.php">My Bookings</a>
				<a href="logout.php">Logout</a>
				
			</div>
		</div>
		<div>
			<!--http://www.softcomplex.com/products/tigra_calendar/
			where we got the calendar from-->
			<h2>Choose booking date:</h2>
			<form action="#">
				<!-- add class="tcal" to your input field -->
				<div><input type="text" name="date" class="tcal" value="" /></div>
			</form>
		</div>

		<a class="button-book" id="booked">Book</a>

		
	</section>
	<script type="text/javascript" src="js/zepto.js"></script>
	<script type="text/javascript" src="js/thanks.js"></script>

</body>

</html>