<?php 

	// Password security
	// level 1: Plain text
	// level 2: Hash (md5)
	// level 3: Salt (fixed)
	// level 4: Salt (based on something different for each user, like their id)

	// eg   md5(md5($row['id'])."password");
	
	$salt = "gobbledeegook";

	$goober = md5($salt.penis);

	echo $goober;
 ?>