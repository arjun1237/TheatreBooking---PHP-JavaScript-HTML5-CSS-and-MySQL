<?php 
	include("DBconnect.php");	

 ?>

<!DOTCYPE HTML>

<!-- This page prints out the details of the booking ID and the email to which the booking ID has been sent to -->

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

			<h2> BOOKING SUCCESSFUL...! </h2>			

		</div>		

		<div class="finalBookingConfirm">

			<?php 
				$bookingID = $_POST['bookingID'];

				if(count($bookingID) == 1){					
					echo "
					<li>Your booking reference number is: </li>
					<div class='bookingIDgenerate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$bookingID[0]."</div><br />";
				}
				else{
					echo "<li>Your booking reference numbers are: </li>";
					for ($i=0; $i <count($bookingID) ; $i++) { 
						echo "<div class='bookingIDgenerate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$bookingID[$i]."</div>";
					}
				echo "<br />";
				}
				echo"
				<li>A copy of the ticket has been emailed to : </li>
				<div class='bookingIDgenerate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$_POST['email']."</div><br />
				";
			 ?>

		</div>

		<div class="greetToMeet">See you @ </div> 
		<div class="selfPromotion"><a href="../main.php">justMOVIES</a></div>

		<img class="confirmationimg" src="../images/confirmation.png" width="600" height="430">

		<div class="cancelstuff"> <a href="cancelBooking.php">
			<img src="../images/cancel.png" width="135" height="60" id="cancelImg" />
		</div>
		
	</body>
</html>
