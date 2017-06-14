<?php 

	// this function takes in information provided regarding the booking 
	// and stored into the Booking Table of the SQL

	include("DBconnect.php");
	include("bookedSeats.php");

	function insertBooking($bookingID, $date, $time, $name, $email, $row){
		$conn = connect();
		$check = checkBooked($date, $time);
		$confirm = true;
		for ($i=0; $i <count($check) ; $i++) { 
			if($check[$i] == $row){
				$confirm = false;
			}
		}
		if($confirm){
			 try {
				$query = $conn->prepare(
			 		"INSERT into Booking values(:n,:m,:a,:b,:c,:d);
			 	");
			 	$query->execute(array(':n'=>$bookingID,':m'=>$date,':a'=>$time,':b'=>$name,':c'=>$email,':d'=>$row));
				$conn=null;
			} 
			catch (PDOException $e) {
				echo "PDOException: ".$e->getMessage();
			}
		}
	}

// this page is basically not displayed and it just automatically submits on load
// the reason is since its the page that inserts the booking, each time we refresh, it tries to add duplicate entries.
// to avoid users from doing that, the page is automatically redirected on load.



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script type="text/javascript">
	    	
	    	function redirect(){
	    		document.getElementById('myForm').submit();
	    	}
	    	
	</script>

</head>
<body onload="redirect();">

	<form name="myForm" id="myForm" action="booking6.php" method="POST">
		<?php 

			$date = strtotime($_POST['date']);
			$date = date("Y-m-d", $date);
			$yearString = substr($date,0,4);
			$monthString = substr($date,5,2);
			$dayString = substr($date,8);

			$time = strtotime($_POST['time']);
			$time = date("H:i:s", $time);
			$hourString = substr($date,0,2);
			
			$row = $_POST['seats'];

			$random = $_POST['random'];

			$name = $_POST['name'];
			$name = substr($name, 0,1);
			$name = strtoupper($name);
			$totalID = array();

			for ($i=0; $i <count($row) ; $i++) {		
				$bookingID = $row[$i].$name.$yearString.$hourString.$monthString.$random[$i].$dayString;	
				$totalID[$i] = 	$bookingID;
				insertBooking($bookingID, $_POST['date'], $_POST['time'], $_POST['name'], $_POST['email'], $row[$i]);
			}


			$tempseat = $_POST['seats'];
			$temprand = $_POST['random'];

			echo '<input type="hidden" name="movie" value="'.$_POST['movie'].'">';
			echo '<input type="hidden" name="date" value="'.$_POST['date'].'">';
			echo '<input type="hidden" name="time" value="'.$_POST['time'].'">';	
			echo '<input type="hidden" name="name" value="'.$_POST['name'].'">';
			echo '<input type="hidden" name="email" value="'.$_POST['email'].'">';
			for ($i=0; $i <count($totalID) ; $i++) { 							
				echo '<input type="hidden" name="bookingID[]" value="'.$totalID[$i].'">';	
			}

			for ($i=0; $i < count($tempseat); $i++) { 						
				echo '<input type="hidden" name="seats[]" value="'.$tempseat[$i].'">';
			}		

		 ?>		 


	</form>

</body>
</html>