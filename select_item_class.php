<!DOCTYPE html>
<html> 
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type = "text/css" rel = "stylesheet" href = "css/items.css"/>
	<link type = "text/css" rel = "stylesheet" href = "css/main.css"/>
	<link type = "text/css" rel = "stylesheet" href = "css/grid.css"/>

	<title>Items</title>

</head>

<body>
	
	<?php 
		include 'php/dbconnect.php';
		include 'php/generateAllEquipment.php';
		
		//connect to database
		dbconnect($connection);
		//construct and execute content query
		$finalQuery = "SELECT e.id, e.name, e.description, e.available, e.total, e.image FROM equipment e;";
		$result = mysqli_query($connection, $finalQuery);


	?>
	
	
	<section id = "top-filter">
	
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
	
		<h2>Filter By: Class</h2>
	
		<select id = "class-select">
		  <option value="iat100">IAT 100</option>
		  <option value="iat202">IAT 202</option>
		  <option value="iat244">IAT 244</option>
		  <option value="iat267">IAT 267</option>
		  <option value="iat320">IAT 320</option>
		  <option value="iat344">IAT 344</option>
		  <option value="iat351">IAT 351</option>
		  <option value="iat443">IAT 443</option>
		</select>
	
	</section>
	
	<section id = "item-list">
		
		<?php
		$user = $_GET['username'];
			//generates all equipment (see generateAllEquipment.php)
			generateAllEquipment($result, $user);
		?>
		
		<!-- sample human readable item code, assume this is the structure for each generated item. Remove at end of project -->
		
<!-- 		<div class = "single-item">
			<a href = "EquipmentSelection2.php">
				<div class = "img-frame">
					<img src = "img/camera.jpg">
				</div>
				
				<div class = "item-desc">
					<p>Camera</p>
					<p>dSLR Camera Includes 18-55mm f3.5-5.6 lens, 18 megapixel APS-C, 1920 x 1080 HD video at 24 (23.976)... </p>
					<p>Availability: 5/5</p>
				</div>
			</a>
		</div> -->
		
		</section>
		
	</body>
		<script type="text/javascript" src="js/dropdown.js"></script>

</html>