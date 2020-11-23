<?php
session_start();
include './connect.php';
include './price.php';
	$con = new DBConnector();
	$pdo = $con->connectToDB();

	$price = new price();
	$id = $_GET['id'];
	$price->setProductID($_GET['id']);
	$typ = $_GET['typ'];
	if(isset($_POST["update"])){
		$price->updatePrice($pdo);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update price</title>
</head>
<body>
	<?php
		if ($typ == "view") {
			//$price->setProductID($_GET['id']);
			$result=$price->getPricess($pdo);
			foreach ($result as $row) {
				?>
				<div >
			      <br>
			        <p>Product ID:<?php echo $row["product_id"]; ?></p>
			        <p>Lower time limit:<?php echo $row["time_in"]; ?></p>
			        <p>Upper time limit:<?php echo $row["time_out"] ;?></p>
			        <p>Price:<?php echo $row["price"]; ?></p>
			       
			    </div>
			 <?php } }else{
			 	//$price->setProductID($_GET['id']);
			 		foreach ($price->getPricess($pdo) as $row) {
				?>
				<form method="post" action="">
					<div>
						<label>New price</label>
						<input type="number" name="price">
					</div>
					<div>
						<input type="submit" name="update">
					</div>
				</form>
				<?php
			 }
		}
	?>
</body>
</html>