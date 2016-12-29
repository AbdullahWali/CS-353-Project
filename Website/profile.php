<?php
include_once 'dbconnect.php';
session_start();
ob_start();

$logged_in = false;
if ( isset($_SESSION['user'])!="" ) {
  $logged_in = true;
}

//Get info
$account_id = $_REQUEST['account_id'];
$res=mysqli_query($db, "SELECT * FROM Account WHERE account_ID = $account_id;");
$row=mysqli_fetch_array($res);
$name = "{$row['name']} {$row['surname']}";
$email = "{$row['email']}";
$phone = "{$row['phone_number']}";


if( isset($_POST['submit']) ) { 
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
     </ul>
     <ul class="nav navbar-nav navbar-right">
   	<?php
	          		if ($logged_in) {
          					$query = "SELECT *
			  						  FROM Account 
			  						  WHERE account_ID = {$_SESSION['user']};";
			  				$result = mysqli_query($db , $query) or die("Could not execute query");
		  					$row  = mysqli_fetch_array($result);
		  					$logged_in_name = $row['name'];
	          	?>
	          			<li> <p class="navbar-text"> Logged in as <?php echo "$logged_in_name" ?>,  </p></li>
	          			<li><a href="logout.php">Log out</a></li>
	          	<?php } ?>

     </ul>
 </div>
</div>
</nav>

<div class="container">
<div class="row">
<div class= "col-md-3">
<div class="thumbnail">
<div style="text-align: center;vertical-align: middle;">
	<?php echo "<h3>$name,</h3>"; ?>
	<?php echo "<h4>$email</h4>"; ?>
	<?php echo "<h4>$phone</h4>"; ?>
</div>
</div>
</div>

<div class = "col-md-8" style="margin-top:25px;">	
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    <div class="form-group">
    	<textarea class="form-control" rows="3" required="true" name="comment" placeholder="Write your comment here"></textarea>
    	<input type="hidden" name="account_id" id="account_ID" value=<?php echo "{$account_id}"?> />
    </div>
    <div class="form-group">
    	<button style="float: right;" type="submit" class="btn btn-info" name="submit">Submit</button>
    </div>
    </form>

</div>
</div>

<div class="row" style="margin-top: 10px;">
<!--Guest Reviews-->
<?php 
$res = mysqli_query($db, "SELECT C2.name, C2.surname, ranks.review_ID, rating, `comment`, recommended, `date` FROM ACCOUNT C NATURAL JOIN Offering O NATURAL JOIN Accommodation A NATURAL JOIN accomrevs NATURAL JOIN REVIEW R  JOIN ranks NATURAL JOIN ACCOUNT C2 WHERE ranks.review_ID = R.review_ID AND C.account_ID = $account_id");
echo '<div class = "container">
<h4> Reviews from Hosts </h4>
<table class="table">
<thead>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th> Rating </th>
<th> Comment </th>
<th> Recommended </th> 
<th> Date </th>
</tr>
</thead>
<tbody>
';

while($row = mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['surname'] . "</td>";
echo "<td>" . $row['rating'] . "</td>";
echo "<td>" . $row['comment'] . "</td>";
if ($row['recommended']  == 1){ 
	echo "<td>" . "Yes" . "</td>";
}
else { 
		echo "<td>" . "No" . "</td>";
}
echo "<td>" . $row['date'] . "</td>";
echo "</tr>";
}
echo "</tbody>
</table>
</div>";	
?>
</div>	

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>
