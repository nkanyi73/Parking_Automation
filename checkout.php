<?php
session_start();
include './connect.php';
include './functions.php';
if(isset($_SESSION['license_plate'])){
	$con = new DBConnector();
	$pdo = $con->connectToDB();

	$bill = new Bill();
	$bill->setLicensePlate($_SESSION["license_plate"]);
	
	//$bill->getNumberPlate($pdo);
	
/*else{
	echo '<script>alert("Error")</script>';
	echo '<script>window.location="landing.php"</script>';
}*/
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
				
				<th>License Plate</th>
				<th>Ticket Number</th>
				<th>Duration</th>
				<th>Amount to pay</th>
			</tr>
			<tr>
			<?php
			//$bill->setLicensePlate($_SESSION["license_plate"]);
			$result=$bill->getNumberPlate($pdo);
			//print_r($result);
			foreach ($result as $row){
			?>
				<td><?php echo $_SESSION["license_plate"];?></td>
				<td><?php echo $row["ticket_no"];?></td>
				<td><?php echo $row["duration"];?></td>
				<td><?php echo $row["price"];?></td>
				
			<?php } } 
		?>
			</tr>


		</table>
	</div>
</body>
</html>