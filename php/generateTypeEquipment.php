<?php
	
	include 'dbconnect.php';
	//connect to database
	dbconnect($connection);	
	
	$obj = json_decode($_POST["json_string"], true);
	
	$jObject = null;
	
	queryContent($connection, $obj);
	
	function queryContent($connection, $type) {
		
		$typeArray = ['arduino', 'audio', 'camera_lighting', 'computers', 'phones_tablets'];
		$selected = [];
		$count = 0;
		$selectedCount = 0;
		
		foreach($type as $item) {
			if($item == true) {
				$selected[$selectedCount] = $typeArray[$count];
				$selectedCount++;
			}
			$count++;
		}
		
		$contentQuery = "SELECT e.name, e.id, e.available, e.image, e.total FROM type t INNER JOIN equipment e ON t.equipmentId = e.id WHERE";
		
		for($i = 0; $i < count($selected); $i++) {
			
			if($i == 0) {
				$contentQuery .= " t.type = '". $selected[$i]."'";
			} else {
				$contentQuery .= " OR t.type = '". $selected[$i]."'";
			}
		}
		
		$contentQuery .= ";";
		
		
		//do the queries
		$result = mysqli_query($connection, $contentQuery);
		
		$encode = [];
		
		$count = 0;
		
		if(!empty($result)) {
			foreach($result as $value) {
				
				$encode[$count] = $value;
				$count++;
				
			}
		}
		
		//echo $contentQuery;
		
		/* SEND OBJECT BACK TO INDEX AS JSON OBJECT */
		echo json_encode($encode);
	}
	
?>