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
	<link rel="stylesheet" href="css/tcal.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/dropdown.css">
	<script type="text/javascript" src="js/tcal.js"></script>
<!--   <link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/fonts.css">  -->



</head>

<body>
	<section id = "booking" class="center">
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
		
		
		<div>
			<!--http://www.softcomplex.com/products/tigra_calendar/
			where we got the calendar from-->
			<h2>Choose booking date:</h2>
			<form action="#">
				<!-- add class="tcal" to your input field -->
				<div><input type="text" id = "calendar" name="date" class="tcal" value="" required/></div>
			</form>
		</div>
		<a class="button-book" id="booked" onclick = "bookItem()">Book</a>

		
	</section>
	<script type="text/javascript" src="js/zepto.js"></script>
	<script type="text/javascript" src="js/thanks.js"></script>

</body>
<script type="text/javascript" src="js/dropdown.js"></script>
<script>
	function bookItem() {
		var pkg = [bookingDate = document.getElementById('calendar').value, getQueryVariable("id")];
		
		//console.log(userName);
		
		//start AJAX stuff because why not
		if (window.XMLHttpRequest) {
			// Mozilla, Safari, ...
			var xhttp = new XMLHttpRequest();
		} else if (window.ActiveXObject) {
			// IE
				var xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		parameters = "json_string=" + JSON.stringify(pkg);
		
		//send postData to php as a stringified JSON object
			xhttp.open("POST", "php/addBooking.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(parameters);
			
			xhttp.onreadystatechange = function() {
				
				
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					
					console.log(xhttp.responseText);
					
				}
			};
		
		
	}
	
	//code from https://css-tricks.com/snippets/javascript/get-url-variables/
	function getQueryVariable(variable) {
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
	}
</script>

</html>