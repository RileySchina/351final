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
	
	<?php 
		include 'php/dbconnect.php';
		include 'php/generateAllEquipment.php';
		
		//connect to database
		dbconnect($connection);
		//construct and execute content query
		$finalQuery = "SELECT e.id, e.name, e.description, e.available, e.total, e.image FROM equipment e;";
		$result = mysqli_query($connection, $finalQuery);
		//print_f($result);
	?>
	
	
	<section id = "top-filter">
	
	<div class="banner">
			<h1>Sfu Surrey Equipment Booking</h1>
		</div>
	
		<h2>Filter By: Class</h2>
	
		<select id = "class-select" onclick="clickClass()">
		  <option value="IAT100">IAT 100</option>
		  <option value="IAT202">IAT 202</option>
		  <option value="IAT267">IAT 267</option>
		  <option value="IAT351">IAT 351</option>
		</select>
	
	</section>
	
	<section id = "item-list">
		
		<?php
			//generates all equipment (see generateAllEquipment.php)
			//generateAllEquipment($result);
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
	
	<script>
		
		function clickClass(className) {
			
			document.getElementById("item-list").innerHTML = "";
			
			var selected = document.getElementById("class-select");
			var selectedValue = selected.options[selected.selectedIndex].value;
			console.log(selectedValue);
			
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
					
					//var items = JSON.parse(xhttp.responseText);
					
					var items = JSON.parse(xhttp.responseText);
					console.log(items);
					
					for(var itemArray in items) {
						
						itemArray = items[itemArray];
						
						//name, available, total, image, id
						generateSingleItem(itemArray["name"], itemArray["available"], itemArray["total"], itemArray["image"], itemArray["id"]);
					}
				}
			};
			
		}
		
		//EDIT SO THAT IT INCLUDES RILEY'S ROW MARKING
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