<?php  

	session_start();
	// must be at top of code and html
	// will remember variables

	$_SESSION['loginid'] = 1;
	// set a variable that will stay on the page until its closed

	echo $_SESSION['loginid'];

?>