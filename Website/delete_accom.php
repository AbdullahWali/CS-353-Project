<?php
	include_once 'dbconnect.php';
	session_start();

	if ( !isset($_SESSION['user']))
	{
		header("Location: login.php");
		die;
	}
	
	$accountID = $_SESSION['user'];
	$accom_id = $_GET['a_id'];

	$sql = "DELETE FROM Offering WHERE accommodation_ID = $accom_id;";
	$result = mysqli_query($db, $sql);
	$sql = "DELETE FROM Contains WHERE accommodation_ID = $accom_id;";
	$result = mysqli_query($db, $sql);
	$sql = "DELETE FROM Address WHERE accommodation_ID = $accom_id;";
	$result = mysqli_query($db, $sql);
	$sql = "DELETE FROM Room WHERE accommodation_ID = $accom_id;";
	$result = mysqli_query($db, $sql);
	$sql = "DELETE FROM House WHERE accommodation_ID = $accom_id;";
	$result = mysqli_query($db, $sql);
	$sql = "DELETE FROM AccomRevs WHERE accommodation_ID = $accom_id;";
	$result = mysqli_query($db, $sql);
	$sql = "DELETE FROM Accommodation WHERE accommodation_ID = $accom_id;";
	$result = mysqli_query($db, $sql);
	if( $result == true)
	{
		$message = "Deletion is done successfuly!";
		echo "<script type='text/javascript'>";
		echo "alert('" . $message. "');";
		echo 'window.location.href="my_offerings.php";';		
		echo "</script>";
		die;
	}
	else
	{
		$message = "ERROR: Something went wrong while deleting!";
		echo "<script type='text/javascript'>";
		echo "alert('" . $message. "');";
		echo 'window.location.href="my_offerings.php";';		
		echo "</script>";
		die;	
	}
?>
