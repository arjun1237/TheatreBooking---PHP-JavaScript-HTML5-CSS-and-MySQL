<?php 

	include('DBconnect.php');

?>


<!DOTCYPE html>

<!-- This page prints out the details of the cancelled ticket if its successful 
or if its not then it prints the saying information provided was incorrect-->

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

			<h2> CANCEL BOOKING - </h2>

		</div>

		<p class="seatTitle222">Cancelation Details - </p>

		<?php 
			$movie = $_POST['movie'];
			$date = $_POST['date'];
			$time = $_POST['time'];
			$time = substr($time,0,5);
			$isCanceled = $_POST['isCanceled']; 
			$bookingID = $_POST['bookingID'];

			if($isCanceled == 0){

				echo"
					<p class='cancelDetails334'> Please be informed your booking was 'NOT CANCELED'. <br />
					Either the bookingID or email you provided did not match.<br/><br/>
					Click <a href='cancelBooking.php'>here</a> to try again </p>

				";
			}

			else{

				echo"
				<p class='cancelDetails334'> Cancellation of Booking ID: <span='hihandhih'>".$_POST['bookingID']."</span> was successful.<br /> 
				<br/>
				Details of Cancellation:<br />
				<br />
				<span class='forhighlight'>&nbsp&nbspMovie &nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp</span>".$movie."<br />
				<span class='forhighlight'>&nbsp&nbspDate &nbsp&nbsp&nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp</span>".$date."<br />
				<span class='forhighlight'>&nbsp&nbspTime &nbsp&nbsp&nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp</span>".$time." hrs 
				</p>

				";
			}

		 ?>

		<img class="raees" src="../images/coming soon.png" width="650" height="430">

		<div class="cancelstuff"> <a href="cancelBooking.php">
			<img src="../images/cancel.png" width="135" height="60" id="cancelImg" />
		</div>

	</body>
</html>