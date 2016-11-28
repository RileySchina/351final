
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
		<div class = "grid-col-5of10">
			<div>

				<h2>Sort equipment by:</h2>
				 <?php 
			echo "<a class =\"button-home\" href = \"select_item_class.php?username=" . $_GET['username'] . "\">Class</a>" 
			?> 
			<?php 
			echo "<a class =\"button-home\" href = \"select_item_type.php?username=" . $_GET['username'] . "\">Type</a>" 
			?> 
				

			</div>

			<p class="para-home">This booking app is to help students quickly find equipment they need. The two ways to search are by class, where all of the equipment available to that class is shown, and by type, where equipment is sorted by camera equipment, lighting, audio, and miscelaneous.</p>
		</div>

		<div class = "grid-col-5of10" id="item-list">

			<div class = "scrollArea">
				<div class = "single-item">
			<?php 
			echo "<a href = \"EquipmentSelection2.php?username=" . $_GET['username'] . "\">" 
			?> 						<div class = "img-frame">
							<img src = "img/camera.jpg">
						</div>

						<div class = "item-desc">
							<p>Camera</p>
							<p>Availability: 5/5</p>
						</div>
					</a>
				</div>
				<!-- <div class = "single-item"> -->
				
<!-- 			// echo "<a class =\"button-home\" href = \"EquipmentSelection2.php?username=" . $_GET['username'] . "\"></a>" 
 -->			
			<div class = "single-item">
			<?php 
			echo "<a href = \"EquipmentSelection2.php?username=" . $_GET['username'] . "\">" 
			
			?> 			

					<!-- <a href = "EquipmentSelection2.php?username="> -->
						<div class = "img-frame">
							<img src = "img/camera.jpg">
						</div>

						<div class = "item-desc">
							<p>Camera</p>
							<p>Availability: 5/5</p>
						</div>
					</a></div>
				</div>

			</div>

		</div>
	</section>
	<script type="text/javascript" src="js/dropdown.js"></script>
</body>

</html>