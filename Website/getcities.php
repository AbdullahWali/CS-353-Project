<?php
	include_once 'dbconnect.php';
	if(!empty($_POST['city']) && isset($_POST['city'])) {
		$id = $_POST['city'];
		$sql = "SELECT district FROM Address WHERE city = '$id';";
		$query = mysqli_query($db, $sql);
		$list = [];
		while ($row = mysqli_fetch_assoc($query)) {
			$list[] = $row['district'];
		}
		$list = array_unique($list);
		sort($list);
		foreach ($list as $city1){
			echo '<option value="' . $city1 .'">' . $city1 . '</option>';
		}
	}
	else {
		echo "a";
	}
?>

