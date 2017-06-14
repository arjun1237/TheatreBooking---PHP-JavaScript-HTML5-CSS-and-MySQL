<?php 

	include('booking/DBconnect.php');

?>


<!DOTCYPE html>

<!-- This page prints out the contact details of the cinema -->

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

		<div class="content" id="aboutContent">

			<h2> CONTACT </h2>
			<table class="table1">
				<tr>
					<td class="column1" >
						EMAIL: 
					</td>
					<td>
						info@justMOVIES.com
					</td>
				</tr>

				<tr>
					<td class="column1" >
						PHONE:
					</td>
					<td>
						 +44 7777	554	452
					</td>
				</tr>

				<tr>
					<td class="column1" >
						Address:
					</td>
					<td>
						999 St Dunstans<br />
						Canterbury KENT<br />
						CT2 7HY
					</td>
				</tr>

			</table>
		</div>

		<div class="cancelstuff"> <a href="booking/cancelBooking.php">
			<img src="images/cancel.png" width="135" height="60" id="cancelImg" />
		</div>

	</body>


</html>