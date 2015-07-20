<?php  

	mysqli_connect("localhost", "exampledb", "CYt7cEsMf2wxmxFE", "exampledb");

	if (mysqli_connect_error()) {

	 	echo "Could not connect to database.";

	 } else {

	 	echo "Connected!";

	 }

?>