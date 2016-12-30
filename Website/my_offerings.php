<div class="container">

	<table class="table table-bordered table-hover">
		<thead> 
			<tr>
			<td>Accommodation ID</td>
			<td>Accommodation Type</td>
			<td>Price per Night ($)</td>
			<td>Number of People</td>
			<td>Address</td>
			<td>Link</td>
			<!--
			<td>Number of Rooms</td>
			<td>Number of Beds</td>
			<td>Amenities</td>
			<td>Number of Bathrooms</td>
			-->
			</tr>
		</thead>
		<tbody>

<?php
	include_once 'dbconnect.php';
	session_start();
	ob_start();

	if ( !isset($_SESSION['user']))
	{
		header("Location: login.php");
		die;
	}
	
	$accountID = $_SESSION['user'];
	// pull all offerings of the account holder
	$sql = "SELECT A.accommodation_ID, A.type, O.price_per_night, O.offering_ID, A.num_of_people, D.street, D.district, D.city, D.country
			FROM Accommodation A, Offering O, Address D
			WHERE A.accommodation_ID = O.accommodation_ID AND A.accommodation_ID = D.accommodation_ID 
					AND O.account_ID = $accountID;";
	#echo $sql;
	$result = mysqli_query($db, $sql);
	$res_reqs = array();
	if( $result->num_rows > 0)
		while($row = mysqli_fetch_array($result))
			array_push($res_reqs, $row);
	
	#echo "</br>";
	#print_r($res_reqs);
	if( count( $res_reqs) < 1)
		echo "<h2 align='center'><b> You have no offered accommodations! </b></h2>";
	else
	{
		echo "<h2 align='center'><b> Offered Accommodations </b></h2>";
		foreach($res_reqs as $tuple)
		{
			echo "<tr>";
			$id = $tuple['accommodation_ID'];
			$type = $tuple['type'];
			if ( $type === 0) {
				$type2 = 'Room';
			}
			else {
				$type2 = 'House';
			}
			$offID = $tuple['offering_ID'];
			$price = $tuple['price_per_night'];
			$people = $tuple['num_of_people'];
			$street = $tuple['street'];
			$district = $tuple['district'];
			$city = $tuple['city'];
			$country = $tuple['country'];
			echo "<td>$id</td>
				  <td>$type2</td>
				  <td>$price</td>
				  <td>$people</td>
				  <td>$street, $district, $city, $country</td>
				  <td><a href=\"info.php?id=$offID\">Details</a></td>
				  </tr>";
		}
	}
?>

		</tbody>
	</table>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

	<title>CnC</title>

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
          <li class><a href="index.php">Home</a></li>
          <?php echo '<li class = "active"><a href="profile.php?account_id=' . $_SESSION['user']. '" > Profile Page </a> </li>';?>
          <li><a href="detailed_search.php">Detailed Search</a></li>
          <li><a href="add_accommodation.php">Offer Accommodation</a></li>
          <li> <a href = "check_reservations.php"> Check Reservations </a></li>
		  <li> <a href = "my_offerings.php"> My Offerings </a></li>
      </ul>
	 </ul>
		 <ul class="nav navbar-nav navbar-right">
         <?php
          					$query = "SELECT *
			  						  FROM Account 
			  						  WHERE account_ID = {$_SESSION['user']};";
			  				$result = mysqli_query($db , $query) or die("Could not execute query");
		  					$row  = mysqli_fetch_array($result);
		  					$logged_in_name = $row['name'];
	          	?>
	          			<li> <p class="navbar-text"> Logged in as <?php echo "$logged_in_name" ?>,  </p></li>
	          			<li><a href="logout.php">Log out</a></li>
	          			 </ul>
 </div>
</div>
</nav>
</body>
</html>
<?php ob_end_flush(); ?>
