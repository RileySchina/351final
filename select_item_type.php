<!DOCTYPE html>
<html> 

<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type = "text/css" rel = "stylesheet" href = "css/items.css"/>
	<link type = "text/css" rel = "stylesheet" href = "css/main.css"/>
<link rel="stylesheet" href="css/itemScroll.css">
	<title>Items</title>
</head>

<body>	
	
	<section id = "top-filter">
	
	<div class="banner">
			<h1>Sfu Surrey Equipment Booking</h1>
		</div>

		<div class="dropdown">
			<button onclick="dropDown()" class="dropbtn">
			<?php 
			echo $_GET['username']; 
			?>


			</button>
			<div id="myDropdown" class="dropdown-content">
				<a href="userBookings.php">My Bookings</a>
				<a href="logout.php">Logout</a>
				
			</div>
		</div>
	
	
		<h1>Filter By: Type</h1>

		
		<div id = "equipment-type" class="scrollAreaType">


			
			<div onclick = "select(1)" data-value = "1">

				<div class = "img-frame-eq">
					<img src = "img/laptop.jpg">
					
				</div>
				<p>Computers</p>
			</div>
			
			<div  onclick = "select(2)" data-value = "2">
				<div class = "img-frame-eq">
					<img src = "img/audioBoom.jpg">
					
				</div>
				<p>Audio Equipment</p>
			</div>
			
			
			<div onclick = "select(3)" data-value = "3">
				<div class = "img-frame-eq">
					<img src = "img/arduino.jpg">
					
				</div>
				<p>Arduino</p>
			</div>
			
			
			<div onclick = "select(4)" data-value = "4">
				<div class = "img-frame-eq">
					<img src = "img/toolkit.jpg">
					
				</div>
				<p>Hand Tools</p>
			</div>
			
			
			<div onclick = "select(5)" data-value = "5">
				<div class = "img-frame-eq">
					<img src = "img/nexus7.jpg">
					
				</div>
				<p>Phones and Tablets</p>
			</div>
			
		</div>

	</section>
	
	<section id = "item-list">

	
	</section>
		
	
	
	

	</section>

</body>


<script>
		
			var clicked = false;
			var user = "<?php echo $_GET['username']; ?>";
			//screw it this will do for now
			var allItems = '<div class = "single-item">';
			allItems += '<a href = "EquipmentSelection2.php?username='+ user +'">';
			allItems += '<div class = "img-frame">';
			allItems += '<img src = "img/camera.jpg"></div>';
				
			allItems += '<div class = "item-desc"><p>Camera</p>';
			allItems += '<p>dSLR Camera Includes 18-55mm f3.5-5.6 lens, 18 megapixel APS-C, 1920 x 1080 HD video at 24 (23.976)... </p>';
			allItems += '<p>Availability: 5/5</p>';
			allItems += '</div></a></div>';
			
			function select(number) {
				
				if(!clicked) {
				
					clicked = true;
					console.log("AAAAAAAAA");
					
					for(var i = 0; i < 6; i++) {
						document.getElementById("item-list").innerHTML += allItems;
					}
					
				}
				
				
				
				/*
				var e = document.getElementById("aaaa").getAttribute('data-value');

				document.getElementById("demo").innerHTML = e;*/
			}
		



	
	</script>
	
		<script type="text/javascript" src="js/dropdown.js"></script>

</html>