<?php

	include 'dbconnect.php';
	//connect to database
	dbconnect($connection);	
	
	//start session for user
	session_start();
	
	$obj = json_decode($_POST["json_string"], true);
	
	$jObject = null;
	
	addContent($connection, $obj);
	
	//CHANGE USERID from 1
	function addContent($connection, $pkg) {
		$time = strtotime($pkg[0]);

		$bookingDate = date('Y-m-d',$time);
		
		$splitDate = str_replace("-", "", $bookingDate);
		
		$contentQuery = "INSERT INTO useritem (dueDate, equipmentId, userName) VALUES (";
		$contentQuery .= $splitDate .", ". $pkg[1].', "'.$_SESSION['currentUser'].'");';
		
		//do the query!
		mysqli_query($connection, $contentQuery);
		
		
		/* SEND OBJECT BACK TO INDEX AS JSON OBJECT */
		echo "success!";
	}
	
?>