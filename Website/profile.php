<?php
include_once 'dbconnect.php';
session_start();
ob_start();

if ( isset($_SESSION['user'])=="" ) {
  header("Location: index.php");
  exit;
}

//Get info
$account_id = $_SESSION['user'];
$res=mysqli_query($db, "SELECT * FROM Account WHERE account_ID = $account_id;");
$row=mysqli_fetch_array($res);
$name = "{$row['name']} {$row['surname']}";

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
         <li  class="active" ><a href="login.php">Log in</a></li>

     </ul>
 </div>
</div>
</nav>

<div class="container">
  <?php echo "<h3>Hello $name,</h3>"; ?>

  <div class="col-md-2">
    <div class="thumbnail">
      <div class="caption">
        <p><strong>Info</strong></p>
      </div>
    </div>
  </div>
</div>


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


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>
