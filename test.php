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
	
	<section id = "top-filter">
	
	<div class="banner">
			<h1>Sfu Surrey Equipment Booking</h1>
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
		
	
		<h2>Bookings</h2>
	
	</section>
	
	<section id = "item-list">
		
		<!-- sample human readable item code, assume this is the structure for each generated item. Remove at end of project -->
		<div class = "single-item">
			<a href = "EquipmentSelection2.php">
				<div class = "img-frame">
					<img src = "img/camera.jpg">
				</div>
				
				<div class = "item-desc">
					<p><strong>DELL OLYMPUS STRONG TYPE 00001010</strong></p>
					<p>Availability: 5/5</p>
					<a>Delete Booking</a>
				</div>
			</a>
		</div>
		
		<div class = "single-item">
			<a href = "EquipmentSelection2.php">
				<div class = "img-frame">
					<img src = "img/camera.jpg">
				</div>
				
				<div class = "item-desc">
					<p><strong>DELL OLYMPUS STRONG TYPE 00001010</strong></p>
					<p>Availability: 5/5</p>
					<a>Delete Booking</a>
				</div>
			</a>
		</div>
		
		</section>
		
	</body>
	<script type="text/javascript" src="js/dropdown.js"></script>
	<script>
		function clickClass(className) {
			
			var selected = document.getElementById("class-select");
			var selectedValue = selected.options[selected.selectedIndex].value;
			
			//start AJAX stuff
			if (window.XMLHttpRequest) {
				// Mozilla, Safari, ...
				var xhttp = new XMLHttpRequest();
			} else if (window.ActiveXObject) {
				// IE
				var xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			parameters = "json_string=" + JSON.stringify(selectedValue);
			
			//send postData to php as a stringified JSON object
			xhttp.open("POST", "php/generateClassEquipment.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(parameters);
			
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					
					var items = JSON.parse(xhttp.responseText);
					
					document.getElementById("item-list").innerHTML = "";
					
					for(var itemArray in items) {
						
						itemArray = items[itemArray];
						
						//name, available, total, image, id
						generateSingleItem(itemArray["name"], itemArray["available"], itemArray["total"], itemArray["image"], itemArray["id"]);
					}
				}
			};
			
		}
		
		function generateSingleItem(name, available, total, image, id) {
			//screw it this will do for now
			var allItems = '<div class = "single-item">';
			allItems += '<a href = "EquipmentSelection2.php?id=' + id + '">';
			allItems += '<div class = "img-frame">';
			allItems += '<img src = "' + image + '"></div>';
			allItems += '<div class = "item-desc"><p>' + name + '</p>';
			allItems += '<p>Availability: ' + available + '/' + total + '</p>';
			allItems += '</div></a></div>';
			
			document.getElementById("item-list").innerHTML += allItems;
			
		}
	
	</script>
	
</html>