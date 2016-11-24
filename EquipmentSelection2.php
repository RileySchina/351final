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
<!--   <link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/fonts.css">  -->
	
	<style>
	
	img {
		width: 50%;
	}
	
	</style>



</head>

<body>
	<section id = "home" class="center">
		<div class="banner">
			<h1>Sfu Surrey Equipment Booking</h1>
			
		</div>
		<div>
			<h2>Equipment</h2>
		</div>
		<div class="grid-row">
			<div class = "grid-col-5of10">

				<img src= "img/camera.jpg">

			</div>
			<div class = "grid-col-5of10">

				<p>With all the features and capabilities of the EOS 5DS, the EOS 5DS R camera offers the potential for even greater sharpness and fine detail for specialized situations. It features the same Canon designed and manufactured 50.6 Megapixel sensor, with the low-pass filter* (LPF) effect cancelled to provide even more fine edge sharpness and detail for critical subjects such as detailed landscapes, and other situations where getting the sharpest subject detail is a priority.</p>

				<a class="button" href="booking.php">Book Now</a>

			</div>	
		</div>
	</section>
</body>

</html>


<!-- get the right id from equipments and show the corresponding page
 -->

 <?php
include 'php/dbconnect.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$sql = "SELECT id FROM equipment WHERE id='$id'";


 if($id ==1){
printf("$id");
}else if($id ==2){
   printf("$id");
}

?> 