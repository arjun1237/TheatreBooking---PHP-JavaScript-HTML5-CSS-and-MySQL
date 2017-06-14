<?php 

	// this function basically takes in the information of booking ID and email, 
	// and checks whether it exits and deleted the booking and returns 1 indicating the booking was canceled
	// if it does not exist then it returns 0 indicating its not canceled.

	include("DBconnect.php");

	function cancelBooking($bookingID, $email){
		$conn = connect();
		try {
			$query = $conn->prepare(
		 		"SELECT RowNumber from Booking;
		 	");
		 	$query->execute();
		 	$res=$query->fetchAll();

		 	$total1 = count($res);
		}
		catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}

		try {
			$query = $conn->prepare(
		 		"DELETE from Booking where BookingId =:n and Email =:m;
		 	");
		 	$query->execute(array(':n'=>$bookingID, ':m'=>$email));
		} 
		catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}

		try {
			$query = $conn->prepare(
		 		"SELECT RowNumber from Booking;
		 	");
		 	$query->execute();
			$conn=null;
		 	$res=$query->fetchAll();

		 	$total2 = count($res);
		}
		catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}

		$info=$total1-$total2;
		return $info;
	}



 ?>


<!DOTCYPE html>

<html>
	<head>
		<meta charset="UTF-8">

		<title>justMOVIES.com</title>

		<link rel="stylesheet" href="../css/global.css">
		<link rel="stylesheet" href="../css/global1.css">
		<link rel="stylesheet" href="../css/global2.css">


		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

		<script type="text/javascript">
	    	
	    	function redirect(){
	    		document.getElementById('trysubmit123').submit();
	    	}
	    	
		</script>


	</head>
	<body onload="redirect()">

		<?php

			include ('testcancel.php');

			$info = cancelBookingInfo($_POST['bookingID']);


			$isCanceled = cancelBooking($_POST['bookingID'],$_POST['email']);

			echo"

			<form action='cancelBooking3.php' method='POST' id='trysubmit123'>

				<input type='hidden' name='isCanceled' value='".$isCanceled."'>
				<input type='hidden' name='bookingID' value='".$_POST['bookingID']."'>
				<input type='hidden' name='movie' value='".$info['movie']."'>
				<input type='hidden' name='date' value='".$info['date']."'>
				<input type='hidden' name='time' value='".$info['time']."'>

			</form>

			";
		?>

	</body>
</html>