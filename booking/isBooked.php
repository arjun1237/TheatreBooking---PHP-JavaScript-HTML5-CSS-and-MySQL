<?php 
	
	// This function basically takes in date and time info and then checks the seats booked on for that date and time
	// it then returns all the booked seats. 

	include("DBconnect.php");

	function isBooked($PerfDate, $PerfTime){
		$conn=connect();
		$sqldate = date('Y-m-d', strtotime($PerfDate));
		$sqltime = date('H-i-s', strtotime($PerfTime));

		try {
		 	$query = $conn->prepare("
		 		SELECT RowNumber from Booking where PerfDate = :n and PerfTime = :m;
		 	");

		 	$query->execute();
		 	$conn=null;
		 	$res=$query->fetchAll(array(':n'=>$sqldate, ':m'=>$sqltime));

		 	$i=0;
		 	foreach($res as $row){
		 		$booking[$i]=$row['RowNumber'];
		 		$i++;
		 	}

		} 
	    catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}
		return $booking;
	}

 ?>