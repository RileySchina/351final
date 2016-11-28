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
	<link rel="stylesheet" href="css/dropdown.css">
	
	<style>
		#disabled {
			background-color: #919191;
		}
		
		#disabled:hover {
			background-color: #919191;
		}
	</style>



</head>

<body>
	<?php include 'php/generateEquipmentPage.php' ?>

	<section id = "home" class="center">
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
			<h2><?php echo $equipment[1];?></h2>
		</div>
		<div class="grid-row">
			<div class = "grid-col-5of10">

				<img class="equipImg" <?php echo 'src = "'. $equipment[5] . '"';?>  >

			</div>
			<div class = "grid-col-5of10">

				
				<div class="equipPara">
					<h3>Description:</h3>
					<p><?php echo $equipment[2];?></p>
					<h3>Rental Duration: <?php echo $equipment[6];?></h3>
					<h3>Classes used in:</h3>
					<p>
					<?php
						//get all classes
						for($i = 0; $i < count($eClass); $i++) {
							if($i < count($eClass) - 1) {
								echo $eClass[$i] . ", ";
							} else {
								echo "and " . $eClass[$i] . ".";
							}
						}
					
					?></p>
					<h3>Available: <?php echo $equipment[3];?>/<?php echo $equipment[4];?></h3>
				</div>
				
				
				<?php 
					if($equipment[3] == 0) {
						
						echo '<a class="button" id = "disabled">Booking Unavailable</a>';
					} else {
						echo '<a class="button" href = "booking.php?id='. $equipment[0] . '">Book Now</a>';
					}
					
					
				?>

				<!--<a class="button" >Book Now</a> -->

			</div>	
		</div>
	</section>
</body>
<script type="text/javascript" src="js/dropdown.js"></script>

</html>