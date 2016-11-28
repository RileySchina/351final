<?php

	include 'dbconnect.php';
	//connect to database
	dbconnect($connection);	
	
	//start session for user
	session_start();
	
	$deleteQuery = "DELETE FROM useritem WHERE username = '".$_SESSION['currentUser'];
	$deleteQuery .= "' AND equipmentId = ".htmlspecialchars($_GET["id"]).";";
	
	//do the query!
	mysqli_query($connection, $deleteQuery);
	header("Location: ../userBookings.php");
	die();
?>