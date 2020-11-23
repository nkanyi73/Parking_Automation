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
		$price->setPrice($_POST['price']);
		$price->updatePrice($pdo);
		echo '<script>alert("Success")</script>';
		echo '<script>window.location="index.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update price</title>
	<link rel="stylesheet" type="text/css" href="updates.css">
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
				<div class = "update">
				<form method="post" action="">
					<br>
					<br>
					<div>
						<label>New price</label>
						<input type="number" name="price">
					</div>
					<div>
						<input type="submit" name="update">
					</div>
				</form>
					 </div>
				<?php
			 }
		}
	?>
</body>
</html>