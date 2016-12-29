<?php
include_once 'dbconnect.php';
session_start();
ob_start();
?>

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
	<script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

    <title>CnC</title>
    <!-- Latest compiled and minified CSS -->
    
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
     </ul>
     <ul class="nav navbar-nav navbar-right">
         <li  class="active" ><a href="login.php">Log in</a></li>

     </ul>
 </div>
</div>
</nav>

<div class="container">

	<table class="table table-bordered table-hover">
		<thead> 
			<tr>
			<td>Accommodation ID</td>
			<td>Accommodation Type</td>
			<td>Price per Night (€)</td>
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
			$city = $_POST['city'];
			$district = $_POST['district-list'];
			$start_date = $_POST['datetimepicker6'];
			$end_date = $_POST['datetimepicker7'];
			$num_of_people = $_POST['num_of_people'];
			$minprice = $_POST['minprice'];
			$maxprice = $_POST['maxprice'];
			$amenity = [];
			
			if (isset($_POST['wifi'])){
				$wifi = 1;
			}
			else {
				$wifi = 0;
			}
			$amenity[] = $wifi;
			if (isset($_POST['ethernet'])){
				$ethernet = 1;
			}
			else {
				$ethernet = 0;
			}
			$amenity[] = $ethernet;
			if (isset($_POST['tv'])) {
				$tv = 1;
			}
			else {
				$tv = 0;
			}
			$amenity[] = $tv;
			if (isset($_POST['cable'])) {
				$cable = 1;
			}
			else {
				$cable = 0;
			}
			$amenity[] = $cable;
			if (isset($_POST['kitchen'])) {
				$kitchen = 1;
			}
			else {
				$kitchen = 0;
			}
			$amenity[] = $kitchen;
			if (isset($_POST['washing'])) {
				$washing = 1;
			}
			else {
				$washing = 0;
			}
			$amenity[] = $washing;
			if (isset($_POST['dryer'])) {
				$dryer = 1;
			}
			else {
				$dryer = 0;
			}
			$amenity[] = $dryer;
			if (isset($_POST['bathtub'])) {
				$bathtub = 1;
			}
			else {
				$bathtub = 0;
			}
			$amenity[] = $bathtub;
			if (isset($_POST['hangers'])) {
				$hangers = 1;
			}
			else {
				$hangers = 0;
			}
			$amenity[] = $hangers;
			if (isset($_POST['iron'])) {
				$iron = 1;
			}
			else {
				$iron = 0;
			}
			$amenity[] = $iron;
			if (isset($_POST['parking'])) {
				$parking = 1;
			}
			else {
				$parking = 0;
			}
			$amenity[] = $parking;
			$ainput = [];
			
			for ($i = 0; $i < 11; $i = $i+1 ) {
				if ($amenity[$i] === 1){
					$ainput[] = $i+1;
				}
			}
			
			$req = "SELECT A.accommodation_ID, A.type, O.price_per_night, O.offering_ID, A.num_of_people, D.street, D.district, D.city, D.country
					FROM Accommodation A, Offering O, Address D
					WHERE A.accommodation_ID = O.accommodation_ID AND A.accommodation_ID = D.accommodation_ID 
							AND D.city = '$city' 
							AND DATE('$start_date') > O.start_date AND DATE('$end_date') < O.end_date
							AND $minprice < O.price_per_night AND $maxprice > O.price_per_night 
							AND $num_of_people < A.num_of_people 
							AND D.district = '$district'";
			for ( $m = 0; $m < sizeof($ainput); $m = $m + 1) {
				$addition = "AND $ainput[$m] IN (SELECT amenity_ID
												 FROM Contains C
												 WHERE C.accommodation_ID = A.accommodation_ID)";
				$req = $req . $addition;
			}	
			//echo $req;
			$result = mysqli_query($db, $req);
			if ( !$result || mysqli_num_rows($result) == 0) {
				echo '<tr> NO RESULTS FOUND.</tr>';
			}
			else {
				while ($tuple = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					$id = $tuple['accommodation_ID'];
					$type = $tuple['type'];
					if ( $type === 0) {
						$type2 = 'room';
					}
					else {
						$type2 = 'house';
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

<!-- Latest compiled and minified JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>