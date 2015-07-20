<?php  

	setcookie("id", "1234", time()+60*60*24);
	// name, value, time to expire

	echo $_COOKIE['id'];

	// setcookie("id", "", time()-3600);
	// to expire a cookie, set the value to blank and set the time to expire in the past
	
?>