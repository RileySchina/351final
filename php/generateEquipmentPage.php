<?php 

	include 'dbconnect.php';
	//connect to database
	dbconnect($connection);
	
	$eId = htmlspecialchars($_GET["id"]);
	
	
	//get equipment details
	$equipmentQuery = "SELECT * FROM equipment e WHERE e.id = " . $eId .";";
	
	$result = mysqli_query($connection, $equipmentQuery);
	
	$count = 0;
	foreach ($result as $value) {
		
		foreach($value as $iValue) {
			$equipment[$count] = $iValue;
			//echo $equipment[$count];
			$count++;
		}
	}
	
	//get classes available
	$classQuery = "SELECT c.class FROM class c WHERE c.equipmentId = ". $eId.";";
	
	$classResult = mysqli_query($connection, $classQuery);
	
	$cCount = 0;
	
	foreach ($classResult as $value) {
		
		foreach($value as $iValue) {
			$eClass[$cCount] = $iValue;
			$cCount++;
		}
	}
?>