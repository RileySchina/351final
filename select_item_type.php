<!DOCTYPE html>
<html> 

<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type = "text/css" rel = "stylesheet" href = "css/items.css"/>
	<link type = "text/css" rel = "stylesheet" href = "css/main.css"/>

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
		
			<div onclick = "select('arduino')" data-value = "arduino">
				<div class = "img-frame-eq">
					<img src = "img/nexus7.jpg">
					
				</div>
				<p>Arduino</p>
			</div>

			<div onclick = "select('audio')" data-value = "audio">

				<div class = "img-frame-eq">
					<img src = "img/laptop.jpg">
					
				</div>
				<p>Audio</p>
			</div>
			
			<div  onclick = "select('camera_lighting')" data-value = "camera_lighting">
				<div class = "img-frame-eq">
					<img src = "img/audioBoom.jpg">
					
				</div>
				<p>Camera/Lighting</p>
			</div>
			
			
			<div onclick = "select('computers')" data-value = "computers">
				<div class = "img-frame-eq">
					<img src = "img/arduino.jpg">
					
				</div>
				<p>Computers</p>
			</div>
			
			
			<div onclick = "select('phones_tablets')" data-value = "phones_tablets">
				<div class = "img-frame-eq">
					<img src = "img/toolkit.jpg">
					
				</div>
				<p>Phones and Tablets</p>
			</div>
			
			
		</div>

	</section>
	
	<section id = "item-list">

	
	</section>
		
	
	
	

	</section>
<script type="text/javascript" src="js/dropdown.js"></script>
</body>

<script>
		
		var selectedItems = {arduino: false,
							audio: false,
							camera_lighting: false,
							computers: false,
							phones_tablets: false};
		
		function select(eType) {
			
			if(selectedItems[eType] === false) {
				selectedItems[eType] = true;
			} else {
				selectedItems[eType] = false;
			}
			
			clickClass(selectedItems);
			
		}
		
		function clickClass(eTypes) {
			
			//start AJAX stuff
			if (window.XMLHttpRequest) {
				// Mozilla, Safari, ...
				var xhttp = new XMLHttpRequest();
			} else if (window.ActiveXObject) {
				// IE
				var xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			parameters = "json_string=" + JSON.stringify(eTypes);
			
			//send postData to php as a stringified JSON object
			xhttp.open("POST", "php/generateTypeEquipment.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(parameters);
			
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					
					console.log(xhttp.responseText);
					
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

			var allItems = '<div class = "single-item">';
			allItems += '<a href = "EquipmentSelection2.php?id=' + id + '">';
			allItems += '<div class = "img-frame">';
			allItems += '<img src = "' + image + '"></div>';
			allItems += '<div class = "item-desc"><p>' + name + '</p>';
			allItems += '<p>Availability: ' + available + '/' + total + '</p>';
			allItems += '</div></a></div>';
			
			document.getElementById("item-list").innerHTML += allItems;
			
		}
		
		
		/*
			var clicked = false;
			
			//screw it this will do for now
			var allItems = '<div class = "single-item">';
			allItems += '<a href = "EquipmentSelection2.php">';
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
				
				
				
				
				//var e = document.getElementById("aaaa").getAttribute('data-value');

				//document.getElementById("demo").innerHTML = e;
			}*/
		



	
	</script>
	
	
</html>