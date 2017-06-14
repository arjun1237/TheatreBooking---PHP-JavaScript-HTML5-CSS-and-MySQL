<?php 
	
	// this function extracts all the seats from the particular zone provided

	function seatExtract($zone){
		$conn=connect();
		try {
		 	$query = $conn->prepare(
		 		"SELECT RowNumber from Seat where Zone = :n;
		 	");

		 	$query->execute(array(':n'=>$zone));
		 	$conn=null;
		 	$res=$query->fetchAll();

		 	$i=0;
		 	foreach($res as $row){
		 		$seats[$i]=$row['RowNumber'];
		 		$i++;
		 	}

		} 
	    catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}
		return $seats;
	}
 ?>