<?php

	// this function connects to the mySQL

	function connect(){
		 $host = 'dragon.ukc.ac.uk';
		 $dbname = 'ak750';
		 $user = 'ak750';
		 $pwd = 'pass';
		 try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if ($conn) {
				return $conn;
			} 
			else {
				echo 'Failed to connect';
			}
		} 
		catch (PDOException $e) {
		echo "PDOException: ".$e->getMessage();
		}
	}
?>

