<?php

// This Page uses function to fetch the zone and the corresponding price multiplier.
	
	function zoneMultiplier(){
		$conn=connect();
		try {
		 	$query = $conn->prepare(
		 		"SELECT * from Zone;
		 	");

		 	$query->execute();
		 	$conn=null;
		 	$res=$query->fetchAll();

		 	foreach($res as $row){
		 		$zoneMulti[$row['Name']]=$row['PriceMultiplier'];
		 	}

		} 
	    catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}
		return $zoneMulti;
	}
	
 ?>