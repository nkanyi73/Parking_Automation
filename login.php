<?php
session_start();
require_once('dbconnect.php');
if(isset($_POST['login']))
{
$username = $_POST['email'];
$password = $_POST['password'];

 if($conn->connect_error)
 {
     die('Connection failed: '.connect_error);
 }
 else
 {
	$query = "SELECT * FROM admin where email ='$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    if($row['email'] == $username && $row['password'] == $password)
    {
        $_SESSION['$this->getEmail()'] = $row['email'];
        echo '<script>alert("Login Successful")</script>';
    	 echo '<script>window.location = "index.php"</script>';
    }
    else
    {
	
		echo '<script>alert("Login Unsuccessful")</script>';
	   echo '<script>window.location = "login.php"</script>';
        $conn ->close();
        
    } 
 }
}
/*include 'connect.php';
	include 'process.php';

	$con = new DBConnector();
    $pdo = $con->connectToDB();
	
	if(isset($_POST['login'])){
		

		$email = $_POST['email'];
		$password = $_POST['password'];

		$login = new Admin($email,$password);
		echo $login->login($pdo);
	}*/

?>
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<form action="" method="post">
		<div class="login-box">
			<br>
			<br>
			<h2>LOG IN</h2>
			<p class="par">No account? <a href="signup.php">SIGN UP</a></p>
			<br>
			<img src="icon.png" class="icon">
			<div>
				<label for="emp_ID">Employee ID:<label>
				<input type="text" name="id" id="emp_ID" placeholder="Enter ID" required>
			</div>
			<br>
			<br>
			<div>
				<label for="email_add">Email address:<label>
				<input type="email" name="email" id="email_add" placeholder="Enter Email" required>
			</div>
			<br>
			<br>
			<div>
				<label for="pass">Password:<label>
				<input type="password" name="password" id="pass" placeholder="Enter Password" required>
			</div>
			<br>
			<br>
			<div>
				<input type="submit" name="login" value="LOG IN">
			</div>
		</div>
	</form>
</body>
</html>