<?php
	$database_username = "root";
	$database_password = "root";
	$database = "cs353_database";
	$db = mysqli_connect("localhost", $database_username, $database_password, $database)
	or die("Unable to connect to database");
?>
