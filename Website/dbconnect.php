<?php
	$database_username = "root";
	$database_password = "";
	$database = "cs353_database";
	$db = mysqli_connect("localhost", $database_username, $database_password, $database)
	or die("Unable to connect to database");
?>