<?php 
	include("DBconnect.php");	

 ?>

<!DOTCYPE HTML>

<!-- This page displays the seats available and also shows the seats that are booked.
the ones that are available are open to booking and the information paaaed on to the next page.-->

<html>
	<head>
		<meta charset="UTF-8">

		<title>justMOVIES.com</title>

		<link rel="stylesheet" href="../css/global.css">
		<link rel="stylesheet" href="../css/global1.css">
		<link rel="stylesheet" href="../css/global2.css">


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
									include('../getMovies.php');
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

			<h2> BOOKING - STEP 3 </h2>

		</div>

		<p class="seatTitle">SELECT SEAT : <?php echo $_POST['zone']; ?></p>

		<div class="reference445"> <span id="xmark"> X </span> - indicates "Not Available" </div>

		<form action="booking4.php" method="POST" onsubmit="return check();">
			<div class="seatSelectionStep">
				<?php 

					include('extractSeat.php');
					include('bookedSeats.php');

					$nonavailableSeats = checkBooked($_POST['date'], $_POST['time']);

					$zone=$_POST['zone'];
					$seats = seatExtract($zone);
					$seat = $seats[0];
					$row = substr($seat,0,1);
					$length = sizeof($seats);
					echo $row.":   &nbsp;&nbsp;&nbsp;&nbsp;";

					for ($i=0; $i < count($seats) ; $i++) { 

						if($length <10){
							echo '<br />';
						}

						if(substr($seats[$i],0,1) != $row){
							$row = substr($seats[$i],0,1);
							echo '<br />';
							echo '<br />';
							echo $row.":  &nbsp;&nbsp;&nbsp;&nbsp;";
						}
						$seatNum = substr($seats[$i],1);

						$available = true;
						for ($j=0; $j <count($nonavailableSeats) ; $j++) { 
							if($seats[$i] == $nonavailableSeats[$j]){
								$available = false;
								echo '<span class="nonavailable">&nbspX &nbsp;&nbsp'.$seatNum.'&nbsp;&nbsp;</span>';
							}
						}
						if($available){
							echo '<input type="checkbox" name="seats[]" value="'.$seats[$i].'"> '.$seatNum.'&nbsp;&nbsp;';		
						}
					}
				 ?>
			 </div>


			<?php 
					echo '<input type="hidden" name="movie" value="'.$_POST['movie'].'">';
					echo '<input type="hidden" name="date" value="'.$_POST['date'].'">';
					echo '<input type="hidden" name="time" value="'.$_POST['time'].'">';					
					echo '<input type="hidden" name="zone" value="'.$_POST['zone'].'">';
			?>
			 <input class="mainSubmit4" type="submit" value="PROCEED..!">


		</form>

		<div class="cancelstuff"> <a href="cancelBooking.php">
			<img src="../images/cancel.png" width="135" height="60" id="cancelImg" />
		</div>

		<script>

			function check(){
				var totalcheck = document.getElementsByName('seats[]');
				var isChecked = false;
				for(var i=0; i<totalcheck.length; i++){
					if(totalcheck[i].checked){
						isChecked = true;
						break;
					}
				}
				if(!isChecked){
					alert("Must select atleast one seat to continue booking.");
					return false;
				}
			}

		</script>

	</body>

</html>
