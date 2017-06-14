<?php 
	include("DBconnect.php");

	// the function returns the movies available.

	function get_Title(){
		$conn=connect();
		try {
		 	$query = $conn->prepare(
		 		"SELECT distinct Title from Performance;
		 	");

		 	$query->execute();
		 	$conn=null;
		 	$res=$query->fetchAll();

		 	$movies= array();
		 	$i=0;
		 	foreach($res as $row){
		 		$movies[$i]=$row['Title'];
		 		$i++;
		 	}

		} 
	    catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}
		return $movies;
	}

	// the fucntion return the dates availbale for that particular movie.

	function get_Date(){
		if(isset($_POST['movie'])){
			$movie=$_POST['movie'];
			//$movie="3 Idiots";
			$conn=connect();
			try {
			 	$query = $conn->prepare(
			 		"SELECT distinct PerfDate from Performance where Title=:n;
			 	");

			 	$query->execute(array(':n'=>$movie));
			 	$conn=null;
			 	$res=$query->fetchAll();

			 	$PerfDate= array();
			 	$i=0;
			 	foreach($res as $row){
			 		$PerfDate[$i]=$row['PerfDate'];
			 		$i++;
			 	}
			} 
		    catch (PDOException $e) {
				echo "PDOException: ".$e->getMessage();
			}
			//foreach($PerfDate as $date1){
			//	$date = strtotime($date1);
			//	$myFormatForView = date("Y-m-d", $date);
			//	echo $myFormatForView."<br />";
			//}
			return $PerfDate;
		}
	}

	// the fucntion returs the times available for that day and the choosen movie.

	function get_Time(){
		if(isset($_POST['movie']) && isset($_POST['date'])){
			$movie=$_POST['movie'];
			$date=$_POST['date'];
			$conn=connect();
			try {
			 	$query = $conn->prepare(
			 		"SELECT PerfTime from Performance where PerfDate=:m and Title=:n;
			 	");

			 	$query->execute(array(':n'=>$movie, ':m'=>$date));
			 	$conn=null;
			 	$res=$query->fetchAll();

			 	$PerfTime= array();
			 	$i=0;
			 	foreach($res as $row){
			 		$PerfTime[$i]=$row['PerfTime'];
			 		$i++;
			 	}

			} 
		    catch (PDOException $e) {
				echo "PDOException: ".$e->getMessage();
			}
			return $PerfTime;
		}
	}
	
 ?>

<!DOTCYPE html>

<html>
	<head>


		<meta charset="UTF-8">

		<title>justMOVIES.com</title>

		<link rel="stylesheet" href="../css/global.css">
		<link rel="stylesheet" href="../css/global1.css">

		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		
	</head>
	<body>
	
		<nav class="nav-main">

			<div class="bgcolor"> <!-- TO ADD bg color to class="logo" -->    </div>

			<div class="logo"><a href="../main.php" title="HOME">justMOVIES</a></div>

			<ul>
				<li>
					<input type="radio" name="nav-group" id="about" class="nav-option">
					<label for="about" class="nav-item" > <a href="../about.php">ABOUT </a></label>		
					<label for="nav-close" class="nav-close"></label>


				</li>

				<li>
					<input type="radio" name="nav-group" id="movies" class="nav-option">
					<label for="movies" class="nav-item"> MOVIES </label>	
					<label for="nav-close" class="nav-close"></label>
					

					<div class="nav-content">


						<div class="nav-sub">
							<ul>
								<?php 
									$movies= get_Title();

									foreach ($movies as $movie) {
										echo "<li><a href='../".$movie.".php'>".$movie."</a></li>";
									}

								?>
							</ul>							
						</div>
					</div>	

				</li>

				<li>
					<input type="radio" name="nav-group" id="booking445" class="nav-option">
					<label for="booking445" class="nav-item"> <a href="booking.php">BOOKING</a> </label>
					<label for="nav-close" class="nav-close"></label>	
					
				</li>

				<li>
					<input type="radio" name="nav-group" id="contact" class="nav-option">
					<label for="contact" class="nav-item"> <a href="../contact.php">CONTACT</a> </label>
					<label for="nav-close" class="nav-close"></label>	
					
				</li>

			</ul>

		</nav>

		<input type="radio" name="nav-group" id="nav-close" class="nav-close-option">


		<div class="content" id="aboutContent">

			<h2> BOOKING - STEP 1 </h2>

		</div>
		<p class ="chooseamovie">CHOOSE A MOVIE<p>

		<div id="makeBorder2">
			<!-- form sends the info back to this page which is later used by to get date info -->
			<form action="booking.php" method="POST">
				<table >
					<tr>
						<?php 
							// calls the function to get movie details
							$movieMulti = get_Title();
							foreach($movieMulti as $value){
								echo "<tr>";
								echo "<td>  <input class='booking1Submit' type='submit' value='$value' name='movie' width='10px' > <td/>";
								echo "<tr/>";						
							}
					
						?>
					</tr>
					
				</table>

			</form>
		</div>

		<div id="makeBorder3">
			<!-- form sends the date info back to this page which is later used by to get time info -->
			<form action="booking.php" method="POST">
				<table >
					<tr>
						<?php 
							// calls the function to get the date details
							$dateMulti = get_Date();
							if($dateMulti!=""){
								echo "<p class ='chooseadate'>CHOOSE A DATE</p>";
								foreach($dateMulti as $value){
									echo "<tr>";
									echo "<td>  <input class='booking1Submit' type='submit' value='$value' name='date' width='10px' > <td/>";
									echo "<tr/>";						
								}
							}
					
						?>
					</tr>
					
				</table>
				<?php 
					if($dateMulti!=""){
						echo '<input type="hidden" name="movie" value="'.$_POST['movie'].'">';
					}
				?>
			</form>
		</div>

		<div id="makeBorder4">
			<!-- sends all info to next page -->
			<form action="booking2.php" method="POST" onsubmit="infodisplay();">
				<table >
					<tr>
						<?php 
							// calls the function to get the time details.
							$dateMulti = get_Time();
							if($dateMulti!=""){
								echo "<div class ='chooseatime'> CHOOSE A TIME</div>";
								foreach($dateMulti as $value){
									echo "<tr>";
									echo "<td>  <input class='booking1Submit' type='submit' value='$value' name='time' width='10px' > <td/>";
									echo "<tr/>";						
								}
							}
					
						?>
					</tr>
					
				</table>
				<?php 
					if($dateMulti!=""){
						echo '<input type="hidden" name="movie" value="'.$_POST['movie'].'">';
						echo '<input type="hidden" name="date" value="'.$_POST['date'].'">';
					}
				?>

			</form>
		</div>

		<script>

			function infodisplay(){
				var m = "";
				var d = "";
				var t = "";
				var movie = document.getElementsByName('movie');
				var date = document.getElementsByName('date');
				var time = document.getElementsByName('time');
				for(var i=0; i<movie.length; i++){
					if(isset(movie[i])){
						m = movie[i].value;
						break;
					}
				}
				for(var j=0; j<date.length; j++){
					if(isset(date[i])){
						d = date[i].value;
						break;
					}
				}
				for(var k=0; k<time.length; k++){
					if(isset(time[i])){
						t = time[i].value;
						break;
					}
				}
				alert("Selection - Movie: "+m+" |  Date: "+d+" | Time: "+t);
			}

		</script>

		<div class="cancelstuff"> <a href="cancelBooking.php">
			<img src="../images/cancel.png" width="135" height="60" id="cancelImg" />
		</div>
	</body>
</html>