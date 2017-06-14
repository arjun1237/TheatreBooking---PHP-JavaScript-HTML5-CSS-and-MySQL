<?php 
	include("DBconnect.php");	

 ?>

<!DOTCYPE html>

<!-- This page takes information about the user name and email as a part of booking process -->

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

			<h2> BOOKING - STEP 4 </h2>

		</div>

		<p class="seatTitle222">YOUR DETAILS - </p>

		<form name="emailnameform" action="booking5.php" method="POST" onsubmit="return check_info();">

			<div class = "infoForm2667">
				
    			NAME:<br/>
				<input id="nameEnter" type="text" placeholder="Full Name" name="name"><br /><br />

				EMail ID:<br/>
				<input id="emailEnter" type="text" placeholder="Valid EMail" name="email">

			</div>

			<?php 
					$tempseat = $_POST['seats'];
					echo '<input type="hidden" name="movie" value="'.$_POST['movie'].'">';
					echo '<input type="hidden" name="date" value="'.$_POST['date'].'">';
					echo '<input type="hidden" name="time" value="'.$_POST['time'].'">';					
					echo '<input type="hidden" name="zone" value="'.$_POST['zone'].'">';		
					for ($i=0; $i < count($tempseat); $i++) { 						
						echo '<input type="hidden" name="seats[]" value="'.$tempseat[$i].'">';
					}

			?>

			<input class="mainSubmit5"  type="submit" value="REVIEW DETAILS..." >


		</form>

		<script type="text/javascript">
				function check_info(){

					//var namecheck = document.forms["emailnameform"]["name"].value;
					//var emailcheck = document.forms["emailnameform"]["email"].value;

					var name = document.getElementById('nameEnter').value;
					var email = document.getElementById('emailEnter').value;

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

		<div class="cancelstuff"> <a href="cancelBooking.php">
			<img src="images/cancel.png" width="135" height="60" id="cancelImg" />
		</div>
		
	</body>
</html>
