<?php
session_start();
include './connect.php';
include './functions.php';
if(isset($_POST['register'])){
 	$con = new DBConnector();
    $pdo = $con->connectToDB();
     
     $bill = new Bill();
     //$bill->setLicensePlate($_POST['license_plate']);
     $_SESSION["license_plate"]= $_POST["license_plate"];
     echo '<script>alert("Successful")</script>';
	 echo '<script>window.location="checkout.php"</script>';
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Parking</title>
        <link rel="stylesheet" type="text/css" href="landing.css">
    </head>
    
    <body>
        <header>
            <div class ="wrapper">
                <div class="logo">
                    <img src="parkinglogo.png" alt="">
                    <p>Parking</p>
                </div>

                <!--<ul class="nav-area">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>-->
            </div>
            
            <form action="" method="post">
            <div class="welcome-text">
                <h1 for="codes">Enter your license plate to view your details</h1>
                <input type="text" name="license_plate" id="codes" placeholder="Enter License Plate">

                <div class="enter">
                    <input type="submit" name="register" value="Enter">
                </div>
            </div>
        </form>
        </header>

        <footer class="footer">
            <div class="l-footer">
                <h1 class="logo"><img src="parkinglogo.png" alt=""></h1>
                <p>PARKING</p>
            </div>

            <ul class="r-footer">
                <li>
                    <h2>Explore</h2>
                    <ul class="box">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </li>
                
                <li class="features">
                    <h2>Need Help?</h2>
                    <ul class="box h-box">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Sales</a></li>
                    </ul>
                </li>
                
                <li>
                    <h2>Legal</h2>
                    <ul class="box">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Contract</a></li>
                    </ul>
                </li>
            </ul>

            <div class="b-footer">
                <p>All Right Reserved by &copy;Parking 2020</p>
            </div>
        </footer>
    </body>
</html>