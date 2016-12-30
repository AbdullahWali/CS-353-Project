<?php
	include_once 'dbconnect.php';
	session_start();
	ob_start();

	if ( !isset($_SESSION['user']))
	{
		header("Location: login.php");
		die;
	}
	
	// print welcome message at the right-upper corner
	$accountID = $_SESSION['user'];
	$sql = 'SELECT email FROM Account WHERE account_ID = ' .$accountID. ';';
	$result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
	if( $result->num_rows < 1)
	{
		echo $result->num_rows;
		$message = "Invalid account credentials. Please check your email/password!";
		echo "<script type='text/javascript'>";
		echo "alert('" . $message. "');";
		echo 'window.location.href="login.php";';		
		echo "</script>";
		die;
	}
	echo "<h5 align='right' style='padding-right: 10px'><a href='account.php'> Welcome " . $row['email'] . "</a></h4>";
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


<div class="container">
<h3> Detailed Search </h3>
	<form action="search2.php" method="post" role="form">
	
	<!-- SELECT CITY -->
	<div class="col-md-6">
	<div class="form-group">
		<label for="city">Select city:</label>
		<select class="form-control" required id="city" name="city">
			<option value="">Cities</option>
			<?php
			
			$req = "SELECT city FROM Address";
			$result = mysqli_query($db, $req);
			$city = [];
			while ($tuple = mysqli_fetch_assoc($result)) {
				$city[] = $tuple['city'];
				
			}
			$city = array_unique($city);
			sort($city);
			foreach ($city as $value) {
				echo "<option value=\"$value\">$value</option>";
			}
				
			?>
		</select>
	</div>
	</div>
	
	<!-- SELECT DISTRICT-->
	<div class="col-md-6">
	<div class="form-group">
		<label for="city">Select district:</label>
		<select class="form-control" required id="district-list" name="district-list">
			<option value="">Districts</option>
		</select>
	</div>
	</div>

	<!-- CALENDAR DATE PICKER-->					
		<div class='col-md-6'>
			<label for="datetimepicker6">Arrival Date:</label>
				<div class="form-group">
					<div class='input-group date' required id='datetimepicker6' name="datetimepicker6">
						<input type='text' class="form-control" name="datetimepicker6"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div>
					</div>
				</div>
							
							<div class='col-md-6'>
								<label for="datetimepicker7">Departure Date:</label>
								<div class="form-group">
									<div class='input-group date' required id='datetimepicker7' name="datetimepicker7">
										<input type='text' class="form-control" name="datetimepicker7"/>
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>
							
	<!-- CHOOSE NUMBER OF PEOPLE -->				
	<div class="col-md-6">
	<div class="form-group">
		<label for="city">Select number of guests:</label>
		<select class="form-control" id="num_of_people" name="num_of_people">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>
	</div>
	</div>
	
	<!-- PRICE CHOOSE -->
	<div class="col-md-3">
		<div class="form-group">
		<label for="minprice">Minimum Price:</label>
		<input type="text" class="form-control" id="minprice" name="minprice">
      </div>
	</div>
	<div class="col-md-3">
	<div class="form-group">
		<label for="maxprice">Maximum Price:</label>
		<input type="text" class="form-control" id="maxprice" name="maxprice">
      </div>
	</div>
	
	
	<div class="col-md-2">
	<div class="form-group">
	<label for="type">Select type:</label>
		<select class="form-control" required id="type" name="type">
			<option value="House">House</option>
			<option value="Room">Room</option>
			<option value="either">Either</option>
		</select>
	</div>
	</div>
	<!-- CHOOSE AMENITY -->
	<p><b>Select amenities:</b></p>
	<div class="col-md-10">
	<div class="form-group"> 
		<label class="form-check-inline">
		<input class="form-check-input" style="margin:5px;" type="checkbox" id="wifi" name="wifi"> Wi-Fi
		</label>
		<label class="form-check-inline check">
		<input class="form-check-input" style="margin:5px;" type="checkbox" id="ethernet" name="ethernet"> Ethernet
		</label>
		<label class="form-check-inline">
		<input class="form-check-input" style="margin:5px;" type="checkbox" id="tv" name="tv"> TV
		</label>
		<label class="form-check-inline">
		<input class="form-check-input" style="margin:5px;" type="checkbox" id="cable" name="cable"> Cable TV
		</label>
		<label class="form-check-inline">
		<input class="form-check-input" style="margin:5px;" type="checkbox" id="kitchen" name="kitchen"> Kitchen
		</label>
		<label class="form-check-inline">
		<input class="form-check-input" style="margin:5px;" type="checkbox" id="washing" name="washing"> Washing Machine
		</label>
		<label class="form-check-inline">
		<input class="form-check-input" style="margin:5px;" type="checkbox" id="dryer" name="dryer"> Dryer
		</label>
		<label class="form-check-inline">
		<input class="form-check-input" style="margin:5px;" type="checkbox" id="bathtub" name="bathtub"> Bathtub
		</label>
		<label class="form-check-inline">
		<input class="form-check-input" style="margin:5px;" type="checkbox" id="hangers" name="hangers"> Hangers
		</label>
		<label class="form-check-inline">
		<input class="form-check-input" style="margin:5px;" type="checkbox" id="iron" name="iron"> Iron
		</label>
		<label class="form-check-inline">
		<input class="form-check-input" style="margin:5px;" type="checkbox" id="parking" name="parking"> Free Parking
		</label>
	</div>
	</div>
	
	<div class="col-md-12">
	<div class="form-group"> <!-- Submit button !-->
		<button class="btn btn-primary " name="submit" type="submit">Search</button>
	</div>
	</div>
	</form>
</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
		
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script type="text/javascript">
									$(function () {
										$('#datetimepicker6').datetimepicker({
											format: 'YYYY-MM-DD',
											useCurrent: false,
										});
										$('#datetimepicker7').datetimepicker({
										
											format: 'YYYY-MM-DD',
											useCurrent: false,
										});
										$("#datetimepicker6").on("dp.change", function (e) {
											$('#datetimepicker7').data("DateTimePicker").minDate(e.date);
										});
										$("#datetimepicker7").on("dp.change", function (e) {
											$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
										});
										
									});
							</script>	
<script type="text/javascript">
		$(document).ready(function() {
			$('#city').on('change', function() {
				var city = $(this).val();
				if (city) {
					$.ajax({
						type:'POST',
						url:"getcities.php",
						data:'city='+city,
						success:function(data) {
							$('#district-list').html(data);
						}	
					});
				}
				else {
					$('#district-list').html('<option value="">ERROR</option>');
				}
			});	
		});
	</script>
</body>
</html>
<?php ob_end_flush(); ?>
