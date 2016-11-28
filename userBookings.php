<!DOCTYPE html>
<html> 
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type = "text/css" rel = "stylesheet" href = "css/items.css"/>
	<link type = "text/css" rel = "stylesheet" href = "css/main.css"/>
	<link type = "text/css" rel = "stylesheet" href = "css/grid.css"/>
	<link rel="stylesheet" href="css/dropdown.css">
	<link rel="stylesheet" href="css/cssFix.css">

	<title>Items</title>
	
</head>

<body>


	<?php
		session_start();
		include 'php/generateBookedEquipment.php';
	
	?>
	
	<section id = "top-filter">
	
	<div class="banner">
			<h1><a id = "top" href = "home.php">Sfu Surrey Equipment Booking</a></h1>
		</div>
		
		<div class="dropdown">
			<button onclick="dropDown()" class="dropbtn">
			<!-- get the value of the username parameter from the url and display it -->
			<?php 
				//start session for user
				echo $_SESSION['currentUser']; 
			?>
				
			</button>
			<div id="myDropdown" class="dropdown-content">
				<a href="userBookings.php">My Bookings</a>
				<a href="logout.php">Logout</a>
				
			</div>
		</div>
		
	
		<h2>Bookings</h2>
	
	</section>
	
	<section id = "item-list">
		
		<?php  generateContent($result); ?>
		
		<!-- sample human readable item code, assume this is the structure for each generated item. Remove at end of project -->
		<!--<div class = "single-item">
			<a href = "EquipmentSelection2.php">
				<div class = "img-frame">
					<img src = "img/camera.jpg">
				</div>
				
				<div class = "item-desc">
					<p><strong>DELL OLYMPUS STRONG TYPE 00001010</strong></p>
					<p>Booked on: 12/12/2016</p>
					<a href ='#' onclick = "confirmDelete(name,3)">Delete Booking</a>
				</div>
			</a>
		</div>-->
		</section>
		
	</body>
	<script type="text/javascript" src="js/dropdown.js"></script>
	<script>
	
	function confirmDelete(eqName,number) {
		var str = "Are you sure you want to delete this equipment?";
		var ask = confirm(str);
		if(ask){
		  window.location="php/deleteBooking.php?id=" + number;
		}
}
	
	</script>
</html>