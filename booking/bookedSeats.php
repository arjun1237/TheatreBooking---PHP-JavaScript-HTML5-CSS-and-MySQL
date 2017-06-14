<?php 
	// takes in date and time and return the no of seats booked for that particular date and time.

	function checkBooked($date, $time){
		$conn=connect();
		try {
		 	$query = $conn->prepare(
		 		"SELECT RowNumber from Booking where PerfDate = :n and PerfTime = :m;
		 	");

		 	$query->execute(array(':n'=>$date, ':m'=>$time));
		 	$conn=null;
		 	$res=$query->fetchAll();

		 	$i=0;
		 	$seats = array();
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