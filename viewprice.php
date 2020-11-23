<?php
include './connect.php';
include './price.php';
	$con = new DBConnector();
	$pdo = $con->connectToDB();

	$price = new price();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update price</title>
	<link rel="stylesheet" type="text/css" href="viewprice.css">
</head>
<body>
	<div class="price">
	<h2>PRICES</h2>
	<table>
		<thead>
			<th>Product ID</th>
			<th>Lower time limit</th>
			<th>Upper time limit</th>
			<th>Price</th>
			<th>Actions</th>
		</thead>
		<tbody>
			<?php
			foreach ($price->getPrices($pdo) as $row) {
			echo' <tr>
			<td style="border-style: solid;">'.$row["product_id"].'</td>
			<td style="border-style: solid;">'.$row["time_in"].'</td>
			<td style="border-style: solid;">'.$row["time_out"].'</td>
			<td style="border-style: solid;">'.$row["price"].'</td>
			<td style="border-style: solid;"><a class = "view" href = updates.php?id='.$row["product_id"].'&typ=view>View</a>|<a class = "edit" href=updates.php?id='.$row["product_id"].'&typ=edit>Edit</a></td>
			</tr>';

		}

			?>
		</tbody>
	</table>
	</table>
	</div>
</body>
</html>