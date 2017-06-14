<?php 

	include('booking/DBconnect.php');

?>


<!DOTCYPE html>

<!-- This page prints out the history of the cinema -->

<html>
	<head>
		<meta charset="UTF-8">

		<title>justMOVIES.com</title>

		<link rel="stylesheet" href="css/global.css">

		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	</head>
	<body>
	
		<nav class="nav-main">

			<div class="bgcolor"> <!-- TO ADD bg color to class="logo" -->    </div>

			<div class="logo"><a href="main.php" title="HOME">justMOVIES</a></div>

			<ul>
				<li>
					<input type="radio" name="nav-group" id="about" class="nav-option">
					<label for="about" class="nav-item" > <a href="about.php">ABOUT </a></label>		
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
									include('getMovies.php');
									$movies= get_Title();

									foreach ($movies as $movie) {
										echo "<li><a href='".$movie.".php'>".$movie."</a></li>";
									}

								?>
							</ul>					
						</div>

					</div>	

				</li>

				<li>
					<input type="radio" name="nav-group" id="booking445" class="nav-option">
					<label for="booking445" class="nav-item"> <a href="booking/booking.php">BOOKING</a> </label>
					<label for="nav-close" class="nav-close"></label>	
					
				</li>

				<li>
					<input type="radio" name="nav-group" id="contact" class="nav-option">
					<label for="contact" class="nav-item"> <a href="contact.php">CONTACT</a> </label>
					<label for="nav-close" class="nav-close"></label>	
					
				</li>

			</ul>

		</nav>

		<input type="radio" name="nav-group" id="nav-close" class="nav-close-option">

		<div class="content" id="aboutContent">

			<h2> ABOUT </h2>

			<p>
			<strong id="highlight1">justMOVIES </strong> is the largest and the most premium film entertainment company in UK. It is listed as UK's Most Trusted Company in the Brand Trust Report consecutively since the past three years in the Category of Entertainment and Display.
			</p>

			<p>
			Since its inception in 1997, the brand has redefined the way people watch movies in UK. Serving 70 million patrons at PAN UK level, the company acquired Cinemax in 2012 and has recently entered into definitive agreements to acquire DT Cinemas. Currently, justMOVIES operates a circuit of 557 screens across 121 locations in 48 cities.
			</p>

			<p>
			justMOVIES Ltd, the integrated 'film and retail brand' has justMOVIES Cinemas as its major subsidiary and JUSTMOVIES Leisure and justMOVIES Pictures, the other subsidiaries. justMOVIES Leisure focuses on rolling out F&B and retail entertainment concepts. It's one of a kind venture, 'JUSTMOVIES BluO' is the largest bowling chain in UK comprising of 135 cosmic bowling lanes which spreads across 6 centers. justMOVIES Leisure's first casual dining concept 'Mistral' is another venture that offers patrons a high quality food indulgence experience. Adding to the portfolio, justMOVIES Pictures has been a prolific distributor of non-studio/ independent international films in UK for many years. It is the Leading independent distribution company in UK which has got a pan-UK distribution network.
			</p>

		</div>

		<div class="cancelstuff"> <a href="booking/cancelBooking.php">
			<img src="images/cancel.png" width="135" height="60" id="cancelImg" />
		</div>

	</body>


</html>