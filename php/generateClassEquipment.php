<?php
	
	include 'dbconnect.php';
	//connect to database
	dbconnect($connection);	
	
	$obj = json_decode($_POST["json_string"], true);
	
	$jObject = null;
	
	queryContent($connection, $obj);
	
	function queryContent($connection, $class) {
		$contentQuery = "SELECT e.name, e.id, e.available, e.image, e.total FROM class c INNER JOIN equipment e ON c.equipmentId = e.id WHERE";
		$contentQuery .= " c.class = '". $class."';";
		
		//do the queries
		$result = mysqli_query($connection, $contentQuery);
		
		$encode = [];
		
		$count = 0;
		foreach($result as $value) {
			
			$encode[$count] = $value;
			$count++;
			
		}
		
		/* SEND OBJECT BACK TO INDEX AS JSON OBJECT */
		echo json_encode($encode);
	}
	
?>