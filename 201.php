
<?php  

	// only selecting certain fields
	// faster searching when using big databases

	$link = mysqli_connect("localhost", "exampledb", "CYt7cEsMf2wxmxFE", "exampledb");

	if (mysqli_connect_error()) {

	 	die("Could not connect to database.");
	 	// die will end the script if it is run

	 } else {

	 	echo "Connected!<br />";

	 }

	 $query = "UPDATE users SET id='6' WHERE password='boop' LIMIT 1";
	 // LIMIT 1 will stop after the first update

	 mysqli_query($link, $query);

?>