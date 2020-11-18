<?php
session_start();
include './connect.php';
include './functions.php';
if(isset($_SESSION["ticket"])){
	$con = new DBConnector();
	$pdo = $con->connectToDB();

	$bill = new Bill();
	$bill->setTicketNo($_SESSION["ticket"]);
	$bill->getPay($pdo);
	$result = $bill->getBill($pdo);
	$timein = $bill->getTimeIn($pdo);
	$timeout = $bill->getTimeOut($pdo);
}else{
	echo '<script>alert("Error")</script>';
	echo '<script>window.location="index.php"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Billing</title>
	<link rel="stylesheet" type="text/css" href="billing.css">
</head>
<body>
	<div class="bill">
		<h2>BILLING</h2>
		<table>
			<tr>
				<th>Ticket Number</th>
				<th>Registration Number</th>
				<th>Time in</th>
				<th>Time Out</th>
				<th>Duration</th>
				<th>Amount to pay</th>
			</tr>

			<tr>
				<td><?php echo $_SESSION["ticket"];?></td>
				<td><?php echo $result["license_plate"]?></td>
				<td><?php echo $timein;?></td>
				<td><?php echo $timeout;?></td>
				<td><?php echo $result["duration"];?></td>
				<td><?php echo $result["price"];?></td>
			</tr>

		</table>
	</div>
</body>
</html>