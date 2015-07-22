<?php  

	if ($_POST['submit']) {

		if (!$_POST['email']) $error .= "<br />Please enter your email";
			// .= adds to the existing value
			// in PHP you dont have to use curly brackets if just one line
		
		else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error .= "<br />Please enter a valid email address";
		
		if (!$_POST['password']) $error .= "<br />Please enter your password";

			else {

				if (strlen($_POST['password']) < 8) $error .= "<br />Please enter a password with at least 8 chacters"; 
				if (!preg_match('`[A-Z]`', $_POST['password'])) $error .= "<br />Please include at least 1 capital letter in your password";
				// if there is a password, we check the string length
				// and check regex for a capital letter

			}

		if ($error) echo "There were error(s) in your signup details:".$error;

		else {

			$link = mysqli_connect("localhost", "exampledb", "CYt7cEsMf2wxmxFE", "exampledb");
			// connect to database

			$query = "SELECT * FROM users WHERE email ='".mysqli_real_escape_string($link, $_POST['email'])."'";
			// the information we want to get
			// you HAVE to use mysqli_real_escape_string to protect against SQL injections

			$result = mysqli_query($link, $query);
			// run the query

			$results = mysqli_num_rows($result);
			// the number of items in the database
			// we are checking to see if an email is in the database already 
			// we want the $results to be 0

			if ($results) echo "That email address is already registered. Do you want to log in?";
			
			else {

				$query = "INSERT into users (email, password) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";
				
				//$query = "INSERT into users (email, password) VALUES ('testguy', 'password')";
				// hashing out email address, combining it with the password, hashing the result, and using that as our password

				mysqli_query($link, $query);

				echo "You've been signed up";

			}
			

			

		}
		
	}

?>

<form method="post">
	
	<input type="email" name="email" id="email">

	<input type="password" name="password">

	<input type="submit" name="submit" value="Sign up">

</form>