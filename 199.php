<?php  

	// selecting certain strings

	$link = mysqli_connect("localhost", "exampledb", "CYt7cEsMf2wxmxFE", "exampledb");

	if (mysqli_connect_error()) {

	 	die("Could not connect to database.");

	 } else {

	 	echo "Connected!<br />";

	 }

	 $query = "SELECT * FROM users WHERE name LIKE '%a%'";
	 // % is like * for php

	 if ($result = mysqli_query($link, $query)) {

	 	while ( $row = mysqli_fetch_array($result) ) {
	 		
	 		print_r($row);

		 	echo "<br />It worked!<br />";

	 	}
 
 	 } else {

	 	echo "It failed!<br />";

	 }	 


	 echo "<br /><br /><br />"
?>



<?php  

	// multiple selects using AND

	$link = mysqli_connect("localhost", "exampledb", "CYt7cEsMf2wxmxFE", "exampledb");

	if (mysqli_connect_error()) {

	 	die("Could not connect to database.");

	 } else {

	 	echo "Connected!<br />";

	 }

	 $query = "SELECT * FROM users WHERE id < 4 AND password!='sigor'";
	 // % is like * for php

	 if ($result = mysqli_query($link, $query)) {

	 	while ( $row = mysqli_fetch_array($result) ) {
	 		
	 		print_r($row);

		 	echo "<br />It worked!<br />";

	 	}
 
 	 } else {

	 	echo "It failed!<br />";

	 }	 


	 echo "<br /><br /><br />"
?>



<?php  

	// only selecting certain fields
	// faster searching when using big databases

	$link = mysqli_connect("localhost", "exampledb", "CYt7cEsMf2wxmxFE", "exampledb");

	if (mysqli_connect_error()) {

	 	die("Could not connect to database.");

	 } else {

	 	echo "Connected!<br />";

	 }

	 $query = "SELECT name FROM users";
	 // no quotes from there

	 if ($result = mysqli_query($link, $query)) {

	 	echo mysqli_num_rows($result)." rows<br/>";

	 	while ( $row = mysqli_fetch_array($result) ) {
	 		
	 		print_r($row);

		 	echo "<br />It worked!<br />";

	 	}
 
 	 } else {

	 	echo "It failed!<br />";

	 }	 


	 echo "<br /><br /><br />"

?>