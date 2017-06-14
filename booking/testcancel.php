<?php 

// This Page uses function which accepts the booking ID 
// and checks information regarding the booking ID that is Perfmance date and time if it exits.
// and then it gets the Title from performance table using the above details.
// and finally it returns those information.

	function cancelBookingInfo($bookingID){
		$conn = connect();
		$time = "";
		$date = "";
		$info = array();
		try {
			$query = $conn->prepare(
		 		"SELECT PerfDate, PerfTime from Booking where BookingID = :n;
		 	");
		 	$query->execute(array(':n'=>$bookingID));
		 	$res=$query->fetchAll();

	 		if($res != null){
		 		foreach ($res as $row) {
		 			$info[$row['PerfDate']] = $row['PerfTime'];
		 		}
		 		foreach($info as $key => $value) {
		 			$date=$key;
		 			$time=$value;
		 		}
	 		}
	 	
		}
		catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}

		try {
			$query = $conn->prepare(
		 		"SELECT Title from Performance where PerfDate = :n and PerfTime = :m;
		 	");
		 	$query->execute(array(':n'=>$date, ':m'=>$time));
		 	$conn=null;
		 	$res=$query->fetchAll();

		 	foreach($res as $row){
		 		$movie=$row['Title'];
		 	}
		}
		catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}

		if($info != null){
			$info=array('movie'=>$movie, 'date'=>$date, 'time'=>$time);
			return $info;
		}
	}

?>