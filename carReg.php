<?php
include './functions.php';
include './connect.php';
if(isset($_POST['register'])){
	$con = new DBConnector();
	$pdo = $con->connectToDB();

	$bill = new Bill();
	$bill->setLicensePlate($_POST['license_plate']);
	echo $bill->timein($pdo);

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Time In</title>
	<link rel="stylesheet" type="text/css" href="carReg.css">
</head>
<body>
	<div class="reg">
		<h2>CAR REGISTRATION</h2>
		<form action="" method="post">
		
			<!--<div>
				<label for="ticket">Ticket Number:</label>
				<input type="text" name="ticket_no" id="ticket" placeholder="Enter Ticket No.">
			</div>
			<br>
			<br>-->
			<div>
				<label for="carReg">License Plate:</label>
				<input type="text" name="license_plate" id="carReg" placeholder="Enter Licence Plate">
			</div>
			<br>
			<br>
			<div>
				<input type="submit" name="register" value="Register Car">
			</div>

		</form>
	</div>
</body>
</html>