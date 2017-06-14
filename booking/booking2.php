<?php 
	include("DBconnect.php");


 ?>

<!DOTCYPE HTML>

<!-- This page displays the zone and the corresponding multiplier for that particluar zone.
Basically its prints out the price of each ticket for that zone and for the selected movie. -->

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

			<h2> BOOKING - STEP 2 </h2>

		</div>

		<form action="booking3.php" method="POST" onsubmit="info();">
			<table id="makeBorder1">
				<tr>
						<th>&emsp;SELECT ZONE</th>
						<th id='bookingPrice1'>&emsp;£ PRICE £</th>
				</tr>
				
				<?php 
					include("zoneMultiplier.php");
					include("basicPrice.php");
					$basic = getBasic();
					$zoneMulti = zoneMultiplier();
					$movieSelect = $_POST['movie'];
					$basicPrice = 0;
					$totalPrice = 0;
					foreach ($basic as $key => $value) {
						if($key==$movieSelect){
							$basicPrice = $value;
						}
					}
					foreach($zoneMulti as $key => $value){
						echo "<tr>";
						echo "<td><li> <input class='booking1Submit' type='submit' value='$key' name='zone' width=10px> <td/>";
						$totalPrice = $value*$basicPrice;
						echo "&emsp; £ ".$totalPrice;
						echo "<tr/>";						
					}
					
				 ?>

			</table>

			<?php 
					echo '<input type="hidden" name="movie" value="'.$_POST['movie'].'">';
					echo '<input type="hidden" name="date" value="'.$_POST['date'].'">';
					echo '<input type="hidden" name="time" value="'.$_POST['time'].'">';
			?>

		</form>
		<?php
			if(isset($_POST['zone'])){
				echo "
					<script>

						function info(){
							alert(".$_POST['zone'].");
						}

					</script>
				";
			}
		?>

		<div class="images1234">
			<h2>OVERVIEW</h2>
			<img src="../images/zones/screen.png" id="screen">
			<img src="../images/zones/balcony.png" id="balconyImage">
			<img src="../images/zones/box1.png" id="box1">
			<img src="../images/zones/box2.png" id="box2">
			<img src="../images/zones/box3.png" id="box3">
			<img src="../images/zones/box4.png" id="box4">
			<img src="../images/zones/front.png" id="front">
			<img src="../images/zones/rear.png" id="rear">
		</div>

		<div class="cancelstuff"> <a href="cancelBooking.php">
			<img src="../images/cancel.png" width="135" height="60" id="cancelImg" />
		</div>

	</body>


</html>