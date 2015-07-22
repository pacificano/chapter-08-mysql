<?php  
	
	session_start();

	$link = mysqli_connect("localhost", "exampledb", "CYt7cEsMf2wxmxFE", "exampledb");
	// connect to database

	if ($_POST['submit'] == "Sign Up") {

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

				$_SESSION['id'] = mysqli_insert_id($link);
				// establish a session variabe based on the userid. keep the user logged in

				print_r($_SESSION);

				// redirect to logged in page

			}
			

			

		}
		
	}

	if ($_POST['submit'] == "Log In") {

		$query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND password='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";
		// find user where the email address entered in loginemail AND the password from loginpassword are the same

		$result = mysqli_query($link, $query);
		// actually sending my query to the database

		$row = mysqli_fetch_array($result);
		// display the result of my search as an array

		// print_r($row);
		// ^^ display the array of my result

		// echo $row['id'];
		// ^^ display a specific field from my array

		if ($row) {
		// if there is a result from the search

			$_SESSION['id'] = $row['id'];
			// set the session id to the id of the returned user

			print_r($_SESSION);

			// Redirect to login page
			
		} else {

			echo "We could not find a user with that email and password. Please try again.";

		}
		

	}

?>

<form method="post">
	
	<input type="email" name="email" id="email" value="<?php echo addslashes($_POST['email']); ?>" >
	<!-- the value will be the last stored value when submitted. saves you from retyping -->

	<input type="password" name="password" value="<?php echo addslashes($_POST['password']); ?>" >
	<!-- the value will be the last stored value when submitted. saves you from retyping -->
	<!-- addslashes will add slashes to the value just to make sure if there are double quotes, the whole thing doesnt break -->

	<input type="submit" name="submit" value="Sign Up">

</form>

<form method="post">
	
	<input type="email" name="loginemail" id="loginemail" value="<?php echo addslashes($_POST['email']); ?>" >
	<!-- the value will be the last stored value when submitted. saves you from retyping -->

	<input type="password" name="loginpassword" value="<?php echo addslashes($_POST['password']); ?>" >
	<!-- the value will be the last stored value when submitted. saves you from retyping -->
	<!-- addslashes will add slashes to the value just to make sure if there are double quotes, the whole thing doesnt break -->

	<input type="submit" name="submit" value="Log In">

</form>