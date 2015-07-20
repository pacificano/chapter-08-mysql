
<?php  

	// only selecting certain fields
	// faster searching when using big databases

	$link = mysqli_connect("localhost", "exampledb", "CYt7cEsMf2wxmxFE", "exampledb");

	if (mysqli_connect_error()) {

	 	die("Could not connect to database.");

	 } else {

	 	echo "Connected!<br />";

	 }

	 $query = "INSERT INTO users (name, email, password) VALUES ('Betty', 'betty@hotmail.com', 'boop')";
	 // INSERT values into the table
	 
	 mysqli_query($link, $query);

?>