<?php 

	include('booking/DBconnect.php');

?>

<!DOTCYPE HTML>

<!-- This page prints out the details of the movie - "3 Idiots" -->

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
					<label for="about" class="nav-item"> <a href="about.php">ABOUT </a></label>		
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

		<div class="sidebar">
			<ul>
				<br />
				<li class="sideTitle">MOVIES</li><br />

				<?php 

					$movies= get_Title();

					foreach ($movies as $movie) {
						echo "<li class='sideTitle' id='moviesMain'><a href='".$movie.".php'> ".$movie." </a></li>";
					}

				?>

				<br /><br /><br />
				<li class="sideTitle" id="moviesMain"><a href="movies.php"> MOVIES </a></li>	
				<li class="sideTitle" id="mainPage"><a href="main.php"> HOME </a></li>

				

			</ul>
		</div>


		<img src="images/BG.png" width="1150" height="560" id="bgImage" />
	
		<div class="brief" id="BMB">
			<h2>3 IDIOTS</h2>
			<img src="images/Contemporary/3Idiots/3IdiotsPoster1.png" width="300" height="400" />

		</div>

		<div class="storyTable">

			<div class="storyline">
				
				<table>
				<tr><td >Genre:</td></tr>
				<tr><td >IMDB:</td></tr>
				<tr><td >Main Cast:</td></tr>
				<tr><td >Storyline:</td></tr>
				</table>
			</div>
			<div class="supportColumn">
				<table >				
				<tr><td>Comedy, Drama /td></tr>
				<tr><td>8.7</td></tr>
				<tr><td>Aamir Khan, Madhavan, Kareena Kapoor</td></tr>
				<tr><td>Two friends are searching for their long lost companion. They revisit their college days and recall the memories of their friend who inspired them to think differently, even as the rest of the world called them "idiots".</td></tr>
				</table>
			<div class="bookTheTicket">
				<a href="booking/booking.php">BOOK NOW!</a>
			</div>
		</div>

		<div class="price">
			<img src="images/pound 20.png" width="350" height="350">

		</div>

		<div class="cancelstuff"> <a href="booking/cancelBooking.php">
			<img src="images/cancel.png" width="135" height="60" id="cancelImg" />
		</div>

	</body>


</html>