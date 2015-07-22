<?php  

	session_start();

 	include("209-connection.php");

 	$query = "UPDATE users SET diary='".mysqli_real_escape_string($link, $_POST['diary'])."' WHERE id='".$_SESSION['id']."' LIMIT 1";

 	echo $query;

 	mysqli_query($link, $query);

 	print_r($_SESSION);

?>