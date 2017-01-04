<?php
include_once 'dbconnect.php';
session_start();
ob_start();


$account_id  = $_SESSION['user'];
$res=mysqli_query($db, "SELECT * FROM Account natural JOIN Credentials WHERE account_ID = $account_id;");
$row=mysqli_fetch_array($res);
$password =  $row['password'];


if( isset($_POST['btn-login']) ) { 
 $oldPassword = trim($_POST['oldPassword']);
 $password = trim($_POST['password']);

	  // if there's no error, continue to login

    $res=mysqli_query($db, "SELECT * FROM Account natural join Credentials WHERE account_ID=$account_id ;");
    $row=mysqli_fetch_array($res);
	$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

	if( $count == 1 && $row['password']==$oldPassword ) {
		$res=mysqli_query($db, "UPDATE Credentials SET password = '$password' WHERE account_ID = $account_id ;");
		if( $res)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Password successfully changed!');";
			echo 'window.location.href="profile.php?account_id='.$account_id.'";';
			echo "</script>";
			die;
		}
	} else {
        echo "<script> alert('Wrong Password Entered') </script>";
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

<!--Log in Form-->
<div class="container col-md-4 col-md-offset-5">
    <div class = "row">
        <div class="container col-md-6">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <div class="form-group">
                    <label class="sr-only" for="oldPassword">old Password</label>
                    <input type="password" class="form-control" name = "oldPassword" id="oldPassword" placeholder="Old Password" required="true">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="New Password" required="true">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary center-block" name="btn-login">change</button>
                </div>
            </form>
        </div>
    </div>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>
