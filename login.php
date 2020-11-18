<?php
    include 'connect.php';
    include 'process.php';
    $con = new DBConnector();
    $pdo = $con->connectToDB();
    if(isset($_POST['register']))
    {

        $user = new Admin();
        $user->setID($_POST['id']);
        $user->setPassword($_POST['password']);

       echo $user->login($pdo);
    }

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
				<input type="submit" name="register" value="LOG IN">
			</div>
		</div>
	</form>
</body>
</html>