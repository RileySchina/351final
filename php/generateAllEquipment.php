<?php
	
	function generateAllEquipment($result, $user) {
	
			//Adds all individual items depending on query (maybe don't touch without Tamiko's supervision)
			foreach($result as $value) {
				
				$generate = '<div class = "single-item">';
				$generate .= '<a href = "EquipmentSelection2.php?id=' .$value['id'] . '&username=' . $user .'">';
				$generate .= '<div class = "img-frame"><img src = "' .$value['image']. '"></div>';
				$generate .= '<div class = "item-desc"><p>'.$value['name']. '</p>';
				$generate .= '<p>' .$value['description']. '</p>';
				$generate .= '<p> Availability: ' .$value['available']. '/' .$value['total']. '</p>';
				$generate .= '</div></a></div>';
								
				echo $generate;
		}
}
			
?>