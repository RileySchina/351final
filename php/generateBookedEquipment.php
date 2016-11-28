<?php
	
	include 'dbconnect.php';
	//connect to database
	dbconnect($connection);
	
	$contentQuery = "SELECT u.equipmentId, u.dueDate, e.image, e.name FROM useritem u INNER JOIN equipment e ON u.username = '";
	$contentQuery .= $_SESSION['currentUser'] . "' AND u.equipmentId = e.id";
	
	//echo $contentQuery;

	$result = mysqli_query($connection, $contentQuery);
	
	function generateContent($result) {
		
		foreach($result as $value) {
			
			//print_r($value);
			
			
			echo '<div class = "single-item">';
			echo '<a href = "EquipmentSelection2.php?id='.$value['equipmentId'].'">';
			echo '<div class = "img-frame">';
			echo '<img src = "'.$value['image'].'"></div>';
				
			echo '<div class = "item-desc">';
			echo '<p><strong>'.$value['name'].'</strong></p>';
			echo '<p>Booked on: '.$value['dueDate'].'</p>';
			echo '<a href ="#" onclick = "confirmDelete(name,'.$value['equipmentId'].')">Delete Booking</a>';
			echo '</div></a></div>';
			
		}
	}




?>