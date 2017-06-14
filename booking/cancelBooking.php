<?php 

	include('DBconnect.php');

?>



<!DOTCYPE html>

<!-- This page accepts the information of booking ID and email ID and sends info to
next page to continue the process of cancellation -->

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

		<p class="seatTitle222">Confirm details to cancel - </p>

		<form name="emailnameform" action="cancelBooking2.php" method="POST" onsubmit="return check_info();">

			<div class = "infoForm2667">
				
    			Booking ID:<br/>
				<input id="book3232" type="text" placeholder="Valid Booking ID" name="bookingID"><br /><br />

				EMail ID:<br/>
				<input id="email3232" type="text" placeholder="Email used for Booking" name="email">

			</div>

			<input class="mainSubmit5"  type="submit" value="PROCEED..!" >


		</form>

		<!-- javascript to check email ID validation and also -->

		<script type="text/javascript">

			function check_info(){					
				var name = document.getElementById('book3232').value;
				var email = document.getElementById('email3232').value;

    			if ((name == "") || (name == null) || (email == "") || (email == null)) {
			        alert("Please dont leave the fields empty");
			        return false;
			    }	
			    var at = email.indexOf("@");
			    var dot = email.lastIndexOf(".");
			    var check1 = at+2;
			    var check2 = dot+2;
			    if (at<1 || dot<check1 || check2>=email.length) {
			        alert("Not a valid e-mail address");
			        return false;
			    }	
			}		    
		</script>

		<img class="raees" src="../images/coming soon.png" width="650" height="430">

	</body>
</html>