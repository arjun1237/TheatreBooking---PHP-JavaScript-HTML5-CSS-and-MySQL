<?php
	// extracts the Production table information from SQL and returns the same.

	function getBasic(){
		$conn=connect();
		try {
		 	$query = $conn->prepare(
		 		"SELECT * from Production;
		 	");

		 	$query->execute();
		 	$conn=null;
		 	$res=$query->fetchAll();

		 	foreach($res as $row){
		 		$basicPrice[$row['Title']]=$row['BasicTicketPrice'];
		 	}

		} 
	    catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}
		return $basicPrice;
	}
?>