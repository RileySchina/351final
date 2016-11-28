<!DOCTYPE html>
<html> 

	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link type = "text/css" rel = "stylesheet" href = "css/items.css"/>
		<link type = "text/css" rel = "stylesheet" href = "css/main.css"/>
		<link rel="stylesheet" href="css/dropdown.css">
		<link rel="stylesheet" href="css/cssFix.css">
		<style> 
			#equipment-type > div  {
				margin: 1em;
			}
			
			#equipment-type p {
				margin-top: 2em;
			}
		</style>

		<title>Items</title>
	</head>

	<body>	
		
		<section id = "top-filter">
		
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
		
		
			<h1>Filter By: Type</h1>

			
			<div id = "equipment-type" class="scrollAreaType">
			
				<div onclick = "select('arduino')" data-value = "arduino">
					<div class = "img-frame-eq" data-value = "arduino">
						<img src = "img/arduino.jpg" data-value = "arduino">
						
					</div>
					<p>Arduino</p>
				</div>

				<div onclick = "select('audio')" data-value = "audio">
					<div class = "img-frame-eq" data-value = "audio">
						<img src = "img/audioBoom.jpg" data-value = "audio">
						
					</div>
					<p>Audio</p>
				</div>
				
				<div onclick = "select('camera_lighting')" data-value = "camera_lighting">
					<div class = "img-frame-eq" data-value = "camera_lighting">
						<img src = "img/camera.jpg" data-value = "camera_lighting">
					</div>
					<p>Camera and Lighting</p>
				</div>
				
				
				<div onclick = "select('computers')" data-value = "computers">
					<div class = "img-frame-eq" data-value = "computers">
						<img src = "img/laptop.jpg" data-value = "computers">
						
					</div>
					<p>Computers</p>
				</div>
				
				
				<div onclick = "select('phones_tablets')" data-value = "phones_tablets">
					<div class = "img-frame-eq" data-value = "phones_tablets">
						<img src = "img/nexus7.jpg" data-value = "phones_tablets">
						
					</div>
					<p>Phones and Tablets</p>
				</div>
				
				
			</div>

		</section>
		
		<section id = "item-list">

		
		</section>
			
		
		
		

		</section>

	</body>
	<script type="text/javascript" src="js/dropdown.js"></script>

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
				
				/*
				var allTags = document.querySelectorAll('[data-value]');
				
				for (let item of allTags) {
					
					console.log(item);
					
					if((item.getAttribute('data-value') == eType) && (selectedItems[eType] == true)) {
						item.className += "divTypeSelected";
						item.className += "imgTypeSelected";
					}
					
				}*/
				
				//console.log(allTags);
				
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
		
		</script>
		
		<script type="text/javascript" src="js/dropdown.js"></script>
		
	
</html>