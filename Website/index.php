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

<h3> Quick Search </h3>
	
	<form action="search.php" method="post" role="form">
	<div class="row" >
		<div class='col-md-12'>
		<div class="form-group">
			<label for="city">Select city:</label>
			<select class="form-control" required id="city" name="city">
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
					echo "<option>$value</option>";
				}
				
				?>
			</select>
		</div></div>
	</div>
						
    <div class="row">
		<div class='col-md-6'>
				<label for="datetimepicker6">Arrival Date:</label>
					<div class="form-group">
						<div class='input-group date' id='datetimepicker6' name="datetimepicker6">
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
									<div class='input-group date' id='datetimepicker7' name="datetimepicker7">
										<input type='text' class="form-control" name="datetimepicker7"/>
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>
							
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
						</div>
	<div class="form-group"> <!-- Submit button !-->
		<button class="btn btn-primary " name="submit" type="submit">Search</button>
	</div>

	</form>
</div>


</body>
</html>
<?php ob_end_flush(); ?>
