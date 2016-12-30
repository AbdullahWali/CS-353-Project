<?php

	include_once 'dbconnect.php';
	session_start();
	
	// $accountID = $_SESSION['user'];	UNCOMMENT THIS LINE AND COMMENT THE ONE BELOW WHEN MERGED WITH INDEX.PHP
	$accountID = 1;

	// check validity of the credentials & print welcome message at the right-upper corner
	$sql = 'SELECT email FROM Account WHERE account_ID = ' .$accountID. ';';
	$result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
	if( $result->num_rows < 1)
	{
		$message = "Invalid account credentials. Please check your email/password!";
		echo "<script type='text/javascript'>";
		echo "alert('" . $message. "');";
		echo 'window.location.href="login.php";';		
		echo "</script>";
		die;
	}
	echo "<h5 align='right' style='padding-right: 10px'><a href='account.php'> Welcome " . $row['email'] . "</a></h4>";

	// pull pending reservation requests for the account holder
	$sql = "SELECT O.account_ID AS HostID, O.offering_ID, A.account_ID, A.name, A.surname, R.reservation_ID, R.reserve_start, R.reserve_end" .
			" FROM Offering O, Account A, Reservation R, Makes M" . 
			 " WHERE O.account_ID = $accountID AND R.reservation_ID = M.reservation_ID AND M.reservation_ID NOT IN" .
				" (SELECT reservation_ID FROM Decides) AND O.offering_ID = M.offering_ID AND M.account_ID = A.account_ID;";
	#echo $sql;
	$result = mysqli_query($db, $sql);
	#echo "</br>" . $result->num_rows;
	$res_reqs = array();
	if( $result->num_rows > 0)
		while($row = mysqli_fetch_array($result))
			array_push($res_reqs, $row);
	
	#echo "</br>";
	#print_r($res_reqs);
	if( count( $res_reqs) < 1)
		echo "<h2 align='center'><b> You have no pending reservation requests! </b></h2>";
	else
	{
		echo "<h2 align='center'><b> Pending Reservation Requests </b></h2>";
		echo "</br>";
		echo "<table style='width:95%'; border='1px solid black'; align='center' cellpadding='10'>";
		echo "<tr> <th style='padding: 10px'> Offering ID </th>".
					"<th style='padding: 10px'> Guest </th>".
					"<th style='padding: 10px'> Reservation Start Date </th>".
					"<th style='padding: 10px'> Reservation End Date</th>".
					"<th style='padding: 10px'> Make a decision </th>".
			 "</tr>";
		foreach($res_reqs as $req)
		{
			echo "<tr>";
			echo "<td align = 'center' style='padding: 10px'>".
					"<a href='offerings.php?offering_ID=". $req['offering_ID'] ."'>". $req['offering_ID'] . "</a></td>";
			echo "<td align = 'center' style='padding: 10px'>".
					"<a href='account.php?account_ID=".$req['account_ID']. "'>" .$req['name']. " " .$req['surname']. "</a></td>";
			echo "<td align = 'center' style='padding: 10px'>". date("d/m/Y", strtotime($req['reserve_start'])) . "</td>";
			echo "<td align = 'center' style='padding: 10px'>". date("d/m/Y", strtotime($req['reserve_end'])) . "</td>";
			echo "<td align = 'center' style='padding: 10px'>".
					"<form action='decide_reservation.php' method='post' align='center'>".
						"<button type='submit' name='accepted' value='" .$req['offering_ID']. " " .$req['reservation_ID']. " 1'> Accept </button>".
						"&ensp;".
						"<button type='submit' name='accepted' value='" .$req['offering_ID']. " " .$req['reservation_ID']. " 0'> Reject </button>".
					"</form></td>";				
			echo "</tr>";
		}
		echo '</table></p></br></br>';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CnC</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body style="padding-top: 65px;">
   <!-- Fixed navbar -->
   <nav class="navbar navbar-inverse navbar-fixed-top">
       <div class="container">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="index.php">Crash&Sleep</a>
     	</div>

		<div id="navbar" class="navbar-collapse collapse">
		   <ul class="nav navbar-nav">
		     <li><a href="index.php">Home</a></li>
		     <li><a href="#">About</a></li>
			 <li><a href="detailed_search.php">Detailed Search</a></li>
			 <li><a href="add_accommodation.php">Offer Accommodation</a></li>
		 </ul>
		 <ul class="nav navbar-nav navbar-right">
		     <li  class="active" ><a href="logout.php">Log out</a></li>
		 </ul>
		</div>
	   </div>
	</nav>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
