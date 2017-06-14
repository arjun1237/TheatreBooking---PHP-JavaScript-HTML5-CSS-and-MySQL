<?php 
	include("DBconnect.php");	

 ?>

<!DOTCYPE HTML>

<!-- This page prints out the details of the movie selected by the user and if all the details are correct
as per the user, asks the user to submit the same -->

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

			<h2> BOOKING - STEP 5 </h2>

		</div>

		<p class="seatTitle222">Confirm Details - </p>

		<form action="insertBooking.php" method="POST">

			<div class="detailconfirmform">
				<?php 
					include('basicPrice.php');
					include('zoneMultiplier.php');

					$basePrice = getBasic();
					$base = 0;
					foreach ($basePrice as $key => $value) {
						if($key == $_POST['movie']){
							$base = $value;
						}
					}
					$baseMulti = zoneMultiplier();
					$baseMultiplier = 0;
					foreach ($baseMulti as $key1 => $value1) {
						if($key1 == $_POST['zone']){
							$baseMultiplier = $value1;
						}
					}

					$tempseat = $_POST['seats'];
					$priceOfSeat = $base*$baseMultiplier;
					$seatTotal = count($tempseat);
					$total = $priceOfSeat*$seatTotal;

					$seats111 = "";
					foreach ($_POST['seats'] as $noOfSeats) { 
						$seats111 .= $noOfSeats."&nbsp&nbsp";	
					}

					$phpdate = strtotime( $_POST['time'] );
					$dateacquire = date( 'H:i', $phpdate );


						echo '
							<table>
								<tr>
									<td class = "makeitsmall">NAME: </td>
									<td class = "makeitlarge">'.$_POST['name'].'</td>
								</tr>
								<tr>
									<td class = "makeitsmall">EMAIL: </td>
									<td class = "makeitlarge">'.$_POST['email'].'</td>
								</tr>
								<tr>
									<td class = "makeitsmall">MOVIE: </td>
									<td class = "makeitlarge">'.$_POST['movie'].'</td>
								</tr>	
								<tr>
									<td class = "makeitsmall">Price: </td>
									<td class = "makeitlarge">£ '.$total.' (£ '.$priceOfSeat.' X '.$seatTotal.' seats)</td>
								</tr>							
								<tr>
									<td class = "makeitsmall">DATE: </td>
									<td class = "makeitlarge">'.$_POST['date'].'</td>
								</tr>								
								<tr>
									<td class = "makeitsmall">TIME: </td>
									<td class = "makeitlarge">'.$dateacquire.' hrs</td>
								</tr>
								<tr>
									<td class = "makeitsmall">ZONE: </td>
									<td class = "makeitlarge">'.$_POST['zone'].'</td>
								</tr>
								<tr>
									<td class = "makeitsmall">SEATs: </td>
									<td class = "makeitlarge">'.$seats111.'</td>
								</tr>
							</table>
						';

						echo '<input type="hidden" name="movie" value="'.$_POST['movie'].'">';
						echo '<input type="hidden" name="date" value="'.$_POST['date'].'">';
						echo '<input type="hidden" name="time" value="'.$_POST['time'].'">';	
						echo '<input type="hidden" name="name" value="'.$_POST['name'].'">';
						echo '<input type="hidden" name="email" value="'.$_POST['email'].'">';
						for ($i=0; $i <count($tempseat) ; $i++) { 							
							echo '<input type="hidden" name="random[]" value="'.mt_rand(1000,10000).'">';	
						}

						for ($i=0; $i < count($tempseat); $i++) { 						
							echo '<input type="hidden" name="seats[]" value="'.$tempseat[$i].'">';
						}		

				?>
			</div>
			<input class="mainSubmit6"  type="submit" value="CONFIRM">

		</form>
		
		<img class="raees" src="../images/coming soon.png" width=650" height="430">

		<div class="cancelstuff"> <a href="cancelBooking.php">
			<img src="../images/cancel.png" width="135" height="60" id="cancelImg" />
		</div>
	</body>
</html>
