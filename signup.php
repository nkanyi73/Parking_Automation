<?php
    include 'connect.php';
    include 'process.php';
    $con = new DBConnector();
    $pdo = $con->connectToDB();
    if(isset($_POST['register']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new Admin();
        $user->setFullName($name);
        $user->setEmail($email);
        $user->setPassword($password);

       echo $user->signin($pdo);
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
	<form action="" method="post">
		
		<div class="signup-box">
			<br>
			<br>
		<h2>SIGN UP</h2>
		<h2>Fill in your details below</h2>
		<p class="par">Already have an account? <a href="login.php">LOG IN</a></p>
		<br>
			<img src="icon.png" class="icon">
			<div>
				<label for="full_name">Full name:<label>
				<input type="text" name="name" id="full_name" placeholder="Enter at least 2 names">
			</div>
			<br>
			<br>
			<div>
				<label for="email_add">Email address:<label>
				<input type="email" name="email" id="email_add" placeholder="Enter Email">
			</div>
			<br>
			<br>
			<div>
				<label for="pass">Password:<label>
				<input type="password" name="password" id="pass" placeholder="Enter Password">
			</div>
			<br>
			<br>
			<div>
				<input type="submit" name="register" value="SIGN UP">
			</div>
		</div>
	</form>
</body>
</html>