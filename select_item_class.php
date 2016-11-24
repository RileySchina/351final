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
	
		<h2>Filter By: Class</h2>
	
		<select id = "class-select">
		  <option value="iat100">IAT 100</option>
		  <option value="iat202">IAT 202</option>
		  <option value="iat267">IAT 267</option>
		  <option value="iat351">IAT 351</option>
		</select>
	
	</section>
	
	<section id = "item-list">
		
		<?php
			//generates all equipment (see generateAllEquipment.php)
			generateAllEquipment($result);
		?>
		
		<!-- sample human readable item code, assume this is the structure for each generated item. Remove at end of project -->
		
		<div class = "single-item">
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
		</div>
		
		</section>
		
	</body>
	
</html>