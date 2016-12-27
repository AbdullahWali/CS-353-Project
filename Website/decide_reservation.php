<?php
	
	include_once 'dbconnect.php';

	// $accountID = $_SESSION['user'];	UNCOMMENT THIS LINE AND COMMENT THE ONE BELOW WHEN MERGED WITH INDEX.PHP
	$accountID = 1;
	
	$isAccepted = $_POST["accepted"];
	#echo $isAccepted . "</br>";

	$values = explode(" ", $isAccepted);	// [0] => offeringID; [1] => reservationID; [2] => Status
	#print_r($values);
	
	// parse data from $values
	$offering_ID = $values[0];
	$reservation_ID = $values[1];
	if( $values[2] == 1)
		$state = ' accepted.';
	else
		$state = ' rejected.';

	// make changes on DB
	$sql = "INSERT INTO Decides VALUES( $reservation_ID, $accountID, $values[2]);";
	$result = mysqli_query($db, $sql);
	if($result == true)
	{
		$message = "Reservation request is succesfully" . $state;
		if( $state == ' accepted.')
		{
			$error = false;
			// insert other reservations for this accommodation into Decides table with status = 0
			$sql = "SELECT reservation_ID FROM Makes WHERE offering_ID = $offering_ID;";
			$result = mysqli_query($db, $sql);
			if($result->num_rows > 0)
				while($row = $result->fetch_assoc())
				{
					$otherRes_ID = $row['reservation_ID'];
					if( $otherRes_ID != $reservation_ID)
					{
						$sql = "INSERT INTO Decides VALUES( $otherRes_ID, $accountID, 0);";
						$res2 = mysqli_query($db, $sql);
						if($res2 != true)
							$error = true;
					}
				}
			if( $error)
				$message = "Reservation request is accepted but some errors occured during rejection of other reservations for this accommodation!";
		}
		echo "<script type='text/javascript'>";
		echo "alert('" . $message. "');";
		echo 'window.location.href="check_reservations.php";';		
		echo "</script>";
		die;
	}
	else
	{
		$message = "ERROR: Could not make changes on database!";
		echo "<script type='text/javascript'>";
		echo "alert('" . $message. "');";
		echo 'window.location.href="check_reservations.php";';		
		echo "</script>";
		die;
	}
?>
