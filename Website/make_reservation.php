<?php
	include_once 'dbconnect.php';
	session_start();
	
	$o_id = $_GET['o_id'];
	$err_msg = "Error(s) occured while making reservation! Please try it again or contact customer service.";
	$success_msg = "Your reservation is successfully made. Please wait the acceptance of your request by the host ".
					"and do not forget to check the status of your reservation.";
	
	$account_id = $_SESSION['user'];
	// check if there exists a reservation by the user for this offering with the same date span.
	// if yes; then give warning and die.
	$sql = "SELECT A.city FROM `Reservation` R NATURAL JOIN `Makes` M JOIN `Offering` O ON O.offering_ID = M.offering_ID NATURAL JOIN `Address` A"
			." WHERE M.account_ID = $account_id AND M.offering_ID = $o_id"
			." AND R.reserve_start = '" .$_SESSION['start_date']. "' AND R.reserve_end = '" .$_SESSION['end_date']. "';";
	$result = $db->query($sql);
	if( $result->num_rows > 0)
	{
		echo	'<form name="post_values" action="search.php" method="post">'.
					'<input type="hidden" name="city" value="' .$result->fetch_assoc()['city']. '">'.
					'<input type="hidden" name="datetimepicker6" value="' .$_SESSION['start_date']. '">'.
					'<input type="hidden" name="datetimepicker7" value="' .$_SESSION['end_date']. '">'.
				'</form>';

		showMessage("You already have a reservation for the same time span to this accommodation. Please wait a response from the host!", null);
	}
	$sql = "INSERT INTO `Reservation` VALUES( NULL, '". $_SESSION['start_date']. "', '" .$_SESSION['end_date']. "');";
	$result = mysqli_query($db, $sql);
	if($result == true)
	{
		$reservation_id = $db->insert_id;
		$sql = "INSERT INTO `Makes` VALUES( $reservation_id, $account_id, $o_id);";
		$result = $db->query($sql);
		if( result == true)
			showMessage($success_msg, "my_reservations.php");
		else
		{
			// roll back the added reservation
			$sql = "DELETE FROM `Reservation` WHERE reservation_ID = $reservation_ID;";
			$result = $db->query($sql);
			if( $result == true)
				showMessage($err_msg, "search.php");
			else
				showMessage( "ERROR: Couldn't add to Makes table. Even worse, couldn't delete the reservation that has just made!".
							 " DB is screwed up!", "search.php");
		}
	}
	else
		showMessage($err_msg, "search.php");	
	
	function showMessage( $message, $direction)
	{
		echo "<script type='text/javascript'>";
		echo "alert('" . $message. "');";
		if( $direction)
			echo 'window.location.href="' .$direction. '";';
		else
			echo 'document.forms["post_values"].submit();';
		echo "</script>";
		die;
	}
?>
