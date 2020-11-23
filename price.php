<?php
class price{
	private $product_id,$price;

	public function getProductID(){
		return $this->product_id;
	}
	public function setProductID($product_id){
		$this->product_id = $product_id;
	}
	public function getPrice(){
		return $this->price;
	}
	public function setPrice($price){
		$this->price = $price;
	}
	public function getPrices($pdo){
		$product_id = $this->getProductID();
		$sql = "SELECT * FROM price";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([]);
		$result=$stmt->fetchAll();
		return $result;
		

	}
	public function getPricess($pdo){
		$product_id = $this->getProductID();
		$sql = "SELECT * FROM price WHERE product_id = (?)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$product_id]);
		$result=$stmt->fetchAll();
		return $result;
		

	}
	public function updatePrice($pdo){
		$price = $this->getPrice();
		$product_id = $this->getProductID();
		$sql = "UPDATE price SET price = (?) WHERE product_id = (?)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$price,$product_id]);

	}
}
?>