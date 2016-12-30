<?php
include_once 'dbconnect.php';
session_start();
unset($_SESSION['user']);

ob_start();
 // it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
	header("Location: index.php");
	exit;
}


$error = false;

if( isset($_POST['btn-signup']) ) { 
	$email = trim($_POST['email']);
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$phone_number = trim($_POST['phone_number']);
	$password = trim($_POST['password']);

	if (!$error) {
		$res=mysqli_query($db, "SELECT * FROM Account natural join Credentials WHERE email='$email'");
		$row=mysqli_fetch_array($res);
		$count = mysqli_num_rows($res); //If account != 0, email already exists
		if( $count == 0) {
			//sign up
			$res = mysqli_query($db, "Insert INTO Account Values (DEFAULT, '$first_name' , '$last_name', '$email', '$phone_number' );");
			$id = mysqli_insert_id($db);
			#echo "Insert INTO Credentials Values ($id, '$password' );";
			$res = mysqli_query($db, "Insert INTO Credentials Values ($id, '$password' );");
			#echo "$res";
		} else {
			$errMSG = "Email already exists!";
		}
	}
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
					<li  class="active" ><a href="login.php">Log in</a></li>

				</ul>
			</div>
		</div>
	</nav>



	<!--Sign up form-->
	<div class="container col-md-4 col-md-offset-5">
		<h2 style="margin-left:25px;" ><strong> Become a User</strong></h2><br>
		<div class="container col-md-7">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
				<div class="form-group">
					<label class="sr-only" for="email">Email address</label>
					<input type="email" class="form-control" name = "email" id="email" placeholder="Email" required="true">
				</div>
				<div class="form-group">
					<label class="sr-only" for="first_name">First Name</label>
					<input type="text" class="form-control" name = "first_name" id="first_name" placeholder="First Name" required="true">
				</div>
				<div class="form-group">
					<label class="sr-only" for="last_name">Last Name</label>
					<input type="text" class="form-control" name = "last_name" id="last_name" placeholder="Last Name" required="true">
				</div>          
				<div class="form-group">
					<label class="sr-only" for="phone_number">Phone Number</label>
					<input type="text" class="form-control" name = "phone_number" id="phone_number" placeholder="Phone Number" required="true">
				</div>          
				<div class="form-group">
					<div class="form-group">
						<label class="sr-only" for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" required="true">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary center-block" name="btn-signup">Sign up</button>
					</div>
				</form>

				<!-- Error Handling HTML -->
       <div class = "row">

        <?php
        if ( isset($errMSG) ) {

            ?>
            <div class="form-group">
               <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
            </div>
        </div>
        <?php
    }
    ?>
        </div>


				<!--log in-->
				<h2 style="margin-left: 5px;"><strong>Already a User :)?</strong></h2><br>
				<div>
					<button class="btn btn-primary center-block" onclick="window.location.href = 'login.php' ">Log in</button>
				</div>	
			</div>


		</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>
