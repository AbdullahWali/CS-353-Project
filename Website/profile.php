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
          <li class><a href="index.php">Home</a></li>
          <?php echo '<li class = "active"><a href="profile.php?account_id=' . $_SESSION['user']. '" > Profile Page </a> </li>';?>
          <li><a href="detailed_search.php">Detailed Search</a></li>
          <li><a href="add_accommodation.php">Offer Accommodation</a></li>
          <li> <a href = "check_reservations.php"> Check Reservations </a></li> 
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

<br>
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


<?php   
$res=mysqli_query($db, "SELECT
  *
FROM ACCOUNT
  C1 NATURAL
JOIN
  offering
JOIN
  makes
JOIN ACCOUNT
  C2
WHERE
  offering.offering_ID = makes.offering_ID AND makes.account_ID = C2.account_ID and C1.account_ID <> C2.account_ID AND C1.account_ID = {$_SESSION['user']} AND C2.account_ID = {$account_id} ;");
  $count = mysqli_num_rows($res);
  $canRate = false;
  if ($count > 0) {
    $canRate = true;
  }
?>


<div class = "col-md-8" style="margin-top:25px;">	
    <h5> Rate as Host </h5>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

    <div class="form-group">
    	<textarea class="form-control" rows="3" required="true" name="comment" placeholder="Write your comment here"></textarea>
    	<input type="hidden" name="account_id" id="account_ID" value=<?php echo "{$account_id}"?> />
    </div>
    <div class = "form-group">
         <label for="over_five" class="col-xs-2 col-form-label">Rating</label>
      <div class="col-xs-2">
        <input class="form-control" type="number" value="2.5" max="5" min="1" name="over_five">
      </div>
      </div>

     <?php
        if ( !$canRate) {
            ?>
            <div class="form-group col-md-9">
               <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> You cannot rate this user, must be a host
            </div>
        </div>
        <?php
    }?>
    <div class="form-group">
    	<button style="float: right;" type="submit" class="btn btn-info" name="submit">Submit</button>
    </div>
    </form>

</div>
</div>


<?php 
if( isset($_POST['submit']) ) { 
  if ($canRate) { 
    $comment = $_POST['comment'];
    $over_five = $_POST['over_five'];
    $date = date("Y-m-d");
    $res = mysqli_query($db, "INSERT INTO hostRevs VALUES ( {$_SESSION['user']} , $account_id, $over_five, '$comment', $date);");
  }
}


?>

<div class="row" style="margin-top: 10px;">
<!--Guest Reviews-->
<?php 
$res = mysqli_query($db, "SELECT C2.account_ID, C2.name, C2.surname, ranks.review_ID, rating, `comment`, recommended, `date` FROM ACCOUNT C NATURAL JOIN Offering O NATURAL JOIN Accommodation A NATURAL JOIN accomrevs NATURAL JOIN REVIEW R  JOIN ranks NATURAL JOIN ACCOUNT C2 WHERE ranks.review_ID = R.review_ID AND C.account_ID = $account_id");
echo '<div class = "container">
<h4> Reviews from Guests </h4>
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
echo "<td><a href=profile.php?account_id={$row['account_ID']}>" . $row['name'] . "</a></td>";
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


<?php 
$res = mysqli_query($db, "select * from Account  JOIN  hostRevs WHERE guest_ID =$account_id AND Account.account_ID = host_ID ");
echo '<div class = "container">
<h4> Reviews from Hosts </h4>
<table class="table">
<thead>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th> Rating </th>
<th> Comment </th>
<th> Date </th>
</tr>
</thead>
<tbody>
';

while($row = mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td><a href=profile.php?account_id={$row['host_ID']}>" . $row['name'] . "</a></td>";
echo "<td>" . $row['surname'] . "</td>";
echo "<td>" . $row['rating'] . "</td>";
echo "<td>" . $row['comment'] . "</td>";
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
