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
	<?php
		$id = $_GET['id'];
		$req = "SELECT A.accommodation_ID, A.num_of_people, A.type, A.percentageRecommend, O.price_per_night, AH.name
				AH.surname, AH.email, AH.phone_number, H.avg_host_rank
				FROM Accommodation A, Offering O, Account AH, Host H
				WHERE A.accommodation_ID = O.accommodation_ID AND
					  O.account_ID = AH.account_ID AND
					  H.account_ID = AH.account_ID AND
					  A.accommodation_ID = '$id';";
		$req2 = "SELECT M.amenity_name
				 FROM Amenity M, Accommodation A, Contains C
				 WHERE A.accommodation_ID = C.accommodation_ID AND
					   A.amenity_ID = C.amenity_ID AND
					   A.accommodation_ID = '$id';";
		$result1 = mysqli_query($db, $req);
		$result2 = mysqli_query($db, $req2);
		
		
	?>
</div>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>
