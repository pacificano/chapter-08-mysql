
<?php  

	$link = mysqli_connect("localhost", "exampledb", "CYt7cEsMf2wxmxFE", "exampledb");

	if (mysqli_connect_error()) {

	 	die("Could not connect to database.");

	 } else {

	 	echo "Connected!<br />";

	 }

	 $name = "Na'vi";

	 $query = "SELECT name FROM users WHERE name='".mysqli_real_escape_string($link, $name)."' ";
	 // select a value with a character break in it like ' or "

	 if ($result = mysqli_query($link, $query)) {

	 	while ( $row = mysqli_fetch_array($result) ) {
	 		
	 		print_r($row);

		 	echo "<br />It worked!<br />";

	 	}
 
 	 } else {

	 	echo "It failed!<br />";

	 }	 

?>