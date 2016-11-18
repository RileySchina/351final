<?php
	
	/* this function creates the database connection */
	function dbconnect(&$connection) {
		// Create database connection
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "equipment_database";
		$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		
		// Test if connection succeeded
		if(mysqli_connect_errno()) {
			die("Database connection failed: ". mysqli_connect_errno());
		} else {
			echo '<p>CONNECTINNNGG</p>';
		}
	}

?>