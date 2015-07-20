<?php  

	$link = mysqli_connect("localhost", "exampledb", "CYt7cEsMf2wxmxFE", "exampledb");

	if (mysqli_connect_error()) {

	 	die("Could not connect to database.");

	 } else {

	 	echo "Connected!<br />";

	 }

	 $query = "SELECT * FROM users";

	 if ($result = mysqli_query($link, $query)) {

	 	while ( $row = mysqli_fetch_array($result) ) {
	 		
	 		print_r($row);

		 	echo "<br />It worked!<br />";

	 	}
 
 	 } else {

	 	echo "It failed!<br />";

	 }	 

?>