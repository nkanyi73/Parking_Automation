<?php
class Bill{
	private $licensePlate,$ticketNo;

	public function setTicketNo($ticketNo){
		$this->ticketNo = $ticketNo;
	}
	public function getTicketNo(){
		return $this->ticketNo;
	}

	public function setLicensePlate($licensePlate){
		$this->licensePlate = $licensePlate;
	}
	public function getLicensePlate(){
		return $this->licensePlate;
	}

	public function getTime($pdo){
		try{
			$licensePlate = $this->getLicensePlate();
			$ticketNo = $this->getTicketNo();
			$sql = "SELECT * FROM time_in WHERE ticket_no=?";
			$stmt =$pdo->prepare($sql);
			$stmt->execute([$ticketNo]);
			$result=$stmt->fetch();
			$sql2 = "SELECT * FROM time_out WHERE ticket_no=?";
			$stmt2 =$pdo->prepare($sql2);
			$stmt2->execute([$ticketNo]);
			$result2=$stmt2->fetch();
			//echo $result['time'];
			//echo $result2['time'];

			$time = (strtotime($result2['time']) - strtotime($result['time']))/60;
			return $time;
			//echo ("You have spent".$time." minutes here.");

		}catch(Exception $e){
			return $e->getMessage();
		}
		

	}
	public function timein($pdo){
		$licensePlate = $this->getLicensePlate();
		$sql = "INSERT INTO time_in (license_plate) VALUES (?)";
		$stmt =$pdo->prepare($sql);
		$stmt->execute([$licensePlate]);
		echo '<script>alert("Car successfully registered")</script>';
		echo '<script>window.location="index.php"</script>';
	}
	public function timeout($pdo){
		$ticketNo = $this->getTicketNo();
		$sql = "INSERT INTO time_out (ticket_no) VALUES (?)";
		$stmt =$pdo->prepare($sql);
		$stmt->execute([$ticketNo]);

	}
	public function ins_time($pdo,$time){
		session_start(); 
		$ticketNo = $this->getTicketNo();
		$_SESSION["ticket"] = $ticketNo;
		$sql = "UPDATE time_out SET time_spent = (?) WHERE ticket_no = (?)";
		$stmt =$pdo->prepare($sql);
		$stmt->execute([$time,$ticketNo]);
		echo '<script>alert("Successful")</script>';
		echo '<script>window.location="billing.php"</script>';

	}
	public function getPay($pdo){
		$ticketNo = $this->getTicketNo();
		$sql = "SELECT * FROM time_out WHERE ticket_no = (?)";
		$stmt =$pdo->prepare($sql);
		$stmt->execute([$ticketNo]);
		$result=$stmt->fetch();
		$sql2 = "SELECT * FROM time_in WHERE ticket_no = (?)";
		$stmt2 =$pdo->prepare($sql2);
		$stmt2->execute([$ticketNo]);
		$result2=$stmt2->fetch();
		//echo $result2["license_plate"];
		if($result['time_spent'] < 60){
			$sql3 = "SELECT price FROM price WHERE product_id = (?)";
			$stmt3 =$pdo->prepare($sql3);
			$stmt3->execute([3]);
			$result3=$stmt3->fetch();
			$sql = "INSERT INTO billing (product_ID,ticket_no,duration,price,license_plate) VALUES (?,?,?,?,?)";
			$stmt =$pdo->prepare($sql);
			$stmt->execute([3,$ticketNo,$result["time_spent"],$result3,$result2["license_plate"]]);
		}else if(($result['time_spent'] > 60) && ($result['time_spent'] < 120)){
			$sql3 = "SELECT price FROM price WHERE product_id = (?)";
			$stmt3 =$pdo->prepare($sql3);
			$stmt3->execute([4]);
			$result3=$stmt3->fetch();
			$sql =  "INSERT INTO billing (product_ID,ticket_no,duration,price,license_plate) VALUES (?,?,?,?,?)";
			$stmt =$pdo->prepare($sql);
			$stmt->execute([4,$ticketNo,$result["time_spent"],$result3,$result2["license_plate"]]);
		}else if(($result['time_spent'] > 120) && ($result['time_spent'] < 240)){
			$sql3 = "SELECT price FROM price WHERE product_id = (?)";
			$stmt3 =$pdo->prepare($sql3);
			$stmt3->execute([7]);
			$result3=$stmt3->fetch();
			$sql =  "INSERT INTO billing (product_ID,ticket_no,duration,price,license_plate) VALUES (?,?,?,?,?)";
			$stmt =$pdo->prepare($sql);
			$stmt->execute([7,$ticketNo,$result["time_spent"],$result3,$result2["license_plate"]]);
		}else if(($result['time_spent'] > 240) && ($result['time_spent'] < 360)){
			$sql3 = "SELECT price FROM price WHERE product_id = (?)";
			$stmt3 =$pdo->prepare($sql3);
			$stmt3->execute([8]);
			$result3=$stmt3->fetch();
			$sql =  "INSERT INTO billing (product_ID,ticket_no,duration,price,license_plate) VALUES (?,?,?,?,?)";
			$stmt =$pdo->prepare($sql);
			$stmt->execute([8,$ticketNo,$result["time_spent"],$result3,$result2["license_plate"]]);
		}
		else if(($result['time_spent'] > 240) && ($result['time_spent'] < 360)){
			$sql3 = "SELECT price FROM price WHERE product_id = (?)";
			$stmt3 =$pdo->prepare($sql3);
			$stmt3->execute([13]);
			$result3=$stmt3->fetch();
			$sql =  "INSERT INTO billing (product_ID,ticket_no,duration,price,license_plate) VALUES (?,?,?,?,?)";
			$stmt =$pdo->prepare($sql);
			$stmt->execute([13,$ticketNo,$result["time_spent"],$result3,$result2["license_plate"]]);
		}else{
			$sql3 = "SELECT price FROM price WHERE product_id = (?)";
			$stmt3 =$pdo->prepare($sql3);
			$stmt3->execute([14]);
			$result3=$stmt3->fetch();
			$sql =  "INSERT INTO billing (product_ID,ticket_no,duration,price,license_plate) VALUES (?,?,?,?,?)";
			$stmt =$pdo->prepare($sql);
			$stmt->execute([14,$ticketNo,$result["time_spent"],$result3,$result2["license_plate"]]);
		}
	}
	public function getBill($pdo){
		$ticketNo = $this->getTicketNo();
		$sql = "SELECT * FROM billing WHERE ticket_no = (?)";
		$stmt =$pdo->prepare($sql);
		$stmt->execute([$ticketNo]);
		$result=$stmt->fetch();
		return $result;

	}
	public function getTimeIn($pdo){
		$ticketNo = $this->getTicketNo();
		$sql = "SELECT * FROM time_in WHERE ticket_no = (?)";
		$stmt =$pdo->prepare($sql);
		$stmt->execute([$ticketNo]);
		$result=$stmt->fetch();
		return $result["time"];

	}
	public function getTimeOut($pdo){
		$ticketNo = $this->getTicketNo();
		$sql = "SELECT * FROM time_out WHERE ticket_no = (?)";
		$stmt =$pdo->prepare($sql);
		$stmt->execute([$ticketNo]);
		$result=$stmt->fetch();
		return $result["time"];

	}
	
}

?>