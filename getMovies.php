<?php 

	function get_Title(){
		$conn=connect();
		try {
		 	$query = $conn->prepare(
		 		"SELECT distinct Title from Performance;
		 	");

		 	$query->execute();
		 	$conn=null;
		 	$res=$query->fetchAll();

		 	$movies= array();
		 	$i=0;
		 	foreach($res as $row){
		 		$movies[$i]=$row['Title'];
		 		$i++;
		 	}

		} 
	    catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}
		return $movies;
	}

?>