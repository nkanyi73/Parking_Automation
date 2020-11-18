<?php
include './connect.php';
include './functions.php';
if(isset($_POST['register'])){
 	$con = new DBConnector();
 	$pdo = $con->connectToDB();

 	$bill = new Bill();
 	$bill->setTicketNo($_POST['ticket_no']);
 	$bill->timeout($pdo);
 	$time = $bill->getTime($pdo);
 	$bill-> ins_time($pdo,$time);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Time Out</title>
	<link rel="stylesheet" type="text/css" href="carReg.css">
</head>
<body>
	<div class="reg">
		<h2>CAR REGISTRATION</h2>
		<form action="" method="post">
		
			<div>
				<label for="ticket">Ticket Number:</label>
				<input type="text" name="ticket_no" id="ticket" placeholder="Enter Ticket No.">
			</div>
			<br>
			<br>
			
			<div>
				<input type="submit" name="register" value="Update">
			</div>
		</form>

	</div>	
</body>
</html>