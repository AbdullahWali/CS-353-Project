<?php
	$username = "root";
	$password = "";
	$database = "cs353_database";
	$db = mysqli_connect("localhost", $username, $password, $database)
	or die("Unable to connect to database");
?>