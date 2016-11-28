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
	<link rel="stylesheet" href="css/itemScroll.css">
	<link rel="stylesheet" href="css/dropdown.css">
	<link rel="stylesheet" href="css/cssFix.css">
</head>

<body>

	<?php 
		include 'php/dbconnect.php';
		include 'php/generateAllEquipment.php';
		
		//connect to database
		dbconnect($connection);
		
		//construct and execute content query
		$finalQuery = "SELECT e.id, e.name, e.available, e.total, e.image FROM equipment e;";
		$result = mysqli_query($connection, $finalQuery);
	?>

	<section id = "home" class="center grid-row">
		<div class="banner">
			<h1><a id = "top" href = "home.php">Sfu Surrey Equipment Booking</a></h1>
			
		</div>
		
		<div class="dropdown">
			<button onclick="dropDown()" class="dropbtn">
			<!-- get the value of the username parameter from the url and display it -->
			<?php 
				//start session for user
				session_start();
				echo $_SESSION['currentUser']; 
			?>
				
			</button>
			<div id="myDropdown" class="dropdown-content">
				<a href="userBookings.php">My Bookings</a>
				<a href="logout.php">Logout</a>
				
			</div>
		</div>
		
		
		<div class = "grid-col-5of10">
			<div>
				<h2>Sort equipment by:</h2>
				<a class ="button-home" href = "select_item_class.php">Class</a>
				<a class ="button-home" href = "select_item_type.php">Type</a>
			</div>

			<p class="para-home">This booking app is to help students quickly find equipment they need. The two ways to search are by class, where all of the equipment available to that class is shown, and by type, where equipment is sorted by camera equipment, lighting, audio, and miscelaneous.</p>
		</div>
		
		

		<div class = "grid-col-5of10" id="item-list">

			<div class = "scrollArea">
				
				<?php
					//generates all equipment (see generateAllEquipment.php)
					generateAllEquipment($result);
				?>

			</div>

		</div>
	</section>
	<script type="text/javascript" src="js/dropdown.js"></script>
</body>

</html>