<?php
	session_start();
	include "../connect_no_red.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
			<?php if(!isset($_SESSION['cmpid'])){ ?>
				<div class="text-center" style="color: white">
					<center><h2 style="color: white">Welcome</h2></center>
					<br>
					<span style="color:white">Be a part of the family?</span><br><br>
                    <a class="btn btn-outline-light transbtn" href="signup.php">
                        Sign Up
					</a>
					<br><hr><br>
                    <a class="btn btn-outline-light transbtn" href="login.php">
                        Login
                    </a>
                </div>
            <?php } else { ?>
                <h3 style="color: white">Welcome <span style="text-transform: capitalize"><?php $_SESSION['seller']?></span></h3>
				<br>
				<span style="color:white">Have Something new to add for customers?</span>
				<br>
				<a class="btn btn-outline-light transbtn" href="insert.php">
					Add New Product
				</a>
				<br><br>
				<span style="color:white">See your performance?</span>
				<br>
				<a class="btn btn-outline-light transbtn" href="graph.php">
					Watch your performance
				</a>
				<hr style="color: white">
				<a class="btn btn-outline-light transbtn" href="signout.php">
					Signout
				</a>
				<br><hr><br>
				<a class="btn btn-outline-light transbtn" href="remove_acc.php">
					Delete Membership
				</a>&nbsp;<span style="color:white">Warning!!</span>
            <?php } ?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>