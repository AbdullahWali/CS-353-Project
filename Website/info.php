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
		 <li><a href="add_accommodation.php">Offer Accommodation</a></li>
		 <li> <a href = "check_reservations.php"> Check Reservations </a></li>
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


<div class="container">
	<?php
		$id = $_GET['id'];
		$req = "SELECT A.accommodation_ID, A.num_of_people, A.type, A.percentageRecommend, O.price_per_night, O.start_date, O.end_date,
				AH.name, AH.surname, AH.email, AH.phone_number, H.avg_host_rank, D.street, D.district, D.city, D.country
				FROM Accommodation A, Offering O, Account AH, Host H, Address D
				WHERE A.accommodation_ID = O.accommodation_ID AND
					  D.accommodation_ID = A.accommodation_ID AND
					  O.account_ID = AH.account_ID AND
					  H.account_ID = AH.account_ID AND
					  O.offering_ID = $id;";
		#echo $req;
		$req2 = "SELECT M.amenity_name
				 FROM Amenity M, Accommodation A, Contains C
				 WHERE A.accommodation_ID = C.accommodation_ID AND
					   M.amenity_ID = C.amenity_ID AND
					   A.accommodation_ID = $id;";
		$result1 = mysqli_query($db, $req);
		$result2 = mysqli_query($db, $req2);
		$tuple = mysqli_fetch_assoc($result1);
		$a_id = $tuple['accommodation_ID'];
		$type = $tuple['type'];
		if ( $type === 0) {
			$type2 = 'House';
		}
		else {
			$type2 = 'Room';
		}

		$start_date = $tuple['start_date'];
		$end_date = $tuple['end_date'];
		$street = $tuple['street'];
		$district = $tuple['district'];
		$city = $tuple['city'];
		$country = $tuple['country'];
		$num_of_people = $tuple['num_of_people'];
		$price_per_night = $tuple['price_per_night'];
		$perc = $tuple['percentageRecommend'];
		$hname = $tuple['name'];
		$hsurname = $tuple['surname'];
		$email = $tuple['email'];
		$phone_number = $tuple['phone_number'];
		$avg_host_rank = $tuple['avg_host_rank'];
		
		echo "<h4>The following are details on the offering: </h4>
			  <p>Accommodation ID: $a_id </br>
			  Type: $type2 </br>
			  Address: $street, $district, $city, $country </br>
			  Number of people it can accommodate: $num_of_people </br>
			  Price per night: $price_per_night </br>
			  Recommendation percentage: $perc </br>
			  Available from: $start_date &ensp; until: $end_date </p>
			  <h4> Available amenities: </h4>";
			  $str = "";
		while($tuple2 = mysqli_fetch_assoc($result2)) {	
			$str .= $tuple2['amenity_name'] . ", ";
		}
		echo substr($str, 0, -2);
		echo  "<h4> Contact information: </h4>
			  <p> Host name: $hname $hsurname </br>
			  Email: $email </br>
			  Phone number: $phone_number </br>
			  Host's rank: $avg_host_rank </p>";
	?>
	
	<h4> Do you want to book this place? </h4>
	<div class = "row">
    <div class="container col-md-1">
        <button class="btn btn-primary center-block" onclick="window.location.href = 'make_reservation.php?o_id=<?php echo $id ?>&city=<?php echo $city ?>'">Request Reservation</button>
    </div>
	</div>
</div>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>
