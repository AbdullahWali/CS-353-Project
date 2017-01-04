<?php
	include_once 'dbconnect.php';
	session_start();
	ob_start();

	$address = $_POST['address'];
	$city = $_POST['city'];
	$district = $_POST['district-list'];
	$start_date = $_POST['datetimepicker6'];
	$end_date = $_POST['datetimepicker7'];
	$num_of_people = $_POST['num_of_people'];
	$type = $_POST['accom_type'];
	$price = $_POST['price'];
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
	#echo $address ." | ". $city." | ".$district." | ".$start_date." | ".$end_date." | ".$num_of_people." | ".$type." | ".$price."<br>";
	#print_r($amenity);
	#echo "<br>";
	#print_r($ainput);

	$success_msg = "Your accommodation is sucessfully added to database!";
	$err_msg = "Error(s) occured while adding accommodation! Please try it again or contact customer service.";

	$sql = "INSERT INTO `Accommodation` VALUES(NULL, $num_of_people, $type, NULL);";
	$result = $db->query($sql);
	if( $result == true)
	{
		$accom_id = $db->insert_id;
		$country = NULL;
		$sql = "INSERT INTO `Address` VALUES($accom_id, '$address', '$district', '$city', '$country');";
		$result = $db->query($sql);
		if( $result == true)
		{	
			foreach($ainput as $a_id)
			{
				$sql = "INSERT INTO `Contains` VALUES($a_id, $accom_id);";
				$result = $db->query($sql);
				if( $result == false)
					showMessage( "Error is occured while adding amenities. DB is screwed up!", "add_accommodation.php");
			}
		
			// needs to be retrieved from add_accommodation.php (no time!)		
			$num_of_rooms = 3;
			$num_of_beds = 2;
			$num_of_wc = 2;

			if( $type == 0)	// House
				$sql = "INSERT INTO `House` VALUES($accom_id, $num_of_rooms, $num_of_wc);";
			else // Room
				$sql = "INSERT INTO `Room` VALUES($accom_id, $num_of_beds);";
			$result = $db->query($sql);
			if( $result == true)
			{
				$account_id = $_SESSION['user'];
				$sql = "INSERT INTO `Offering` VALUES(NULL, $account_id, $accom_id, '$start_date', '$end_date', $price);";
				$result = $db->query($sql);
				if( $result == true)
				{
					$sql = "INSERT INTO `Host` VALUES($account_id, NULL);";
					$result = $db->query($sql);
					if( $result)
						showMessage( $success_msg, "my_offerings.php");
					else
						showMessage( "Error occured while adding to the `Host`. DB is screwed up!", "add_accommodation.php");					
				}
				else
					showMessage( "Error occured while adding the offering. DB is screwed up!", "add_accommodation.php");
			}
		}
		else
			showMessage( "Error occured while adding the address. DB is screwed up!", "add_accommodation.php");	
	}
	else
		showMessage( $error_msg, "add_accommodation.php");

	function showMessage( $message, $direction)
	{
		echo "<script type='text/javascript'>";
		echo "alert('" . $message. "');";
		#if( $direction)
		echo 'window.location.href="' .$direction. '";';
		#else
		#	echo 'document.forms["post_values"].submit();';
		echo "</script>";
		die;
	}
?>
