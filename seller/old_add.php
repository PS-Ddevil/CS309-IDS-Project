<?php
	session_start();
    include "../connect_no_red.php";
	if(!isset($_SESSION['cmpid'])){
		// echo "hello".$_SESSION['cmpid'];
		// // echo "<script>alert('heeloooo')</script>;";
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Insert Product</title>
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
            <form action="fill_old.php" method="post" id="form" enctype="multipart/form-data">
			<center style="margin-top: 1%; padding-top: 20px; padding-bottom: 40px; font-size: 25px; color: white"><span>Fill-In Form</span></center>
				<span class="txt" style="color:white">Product</span>
                <select class="box" id="prod" name="prodid" onchan/>
                    <?php
                        $sql = "SELECT ProductID, PName FROM product;";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()){
                    ?>
                        <option value="<?php echo $row['ProductID']?>"><?php echo $row['PName']?></option>
                    <?php 
                        };
                    ?>
                </select>
				<br><br>
				<div class="wrap-input100 validate-input">
                <input class="input100" id="Discount" type="text" placeholder="Discount Percentage" name="Discount" required/>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            	</div>
				<div class="wrap-input100 validate-input">
                <input class="input100" id="Quantity" type="text" placeholder="Quantity to Sell" name="Quantity" required/>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            	</div>
                <br><br>
                <center><input class="btn btn-outline-light" type="submit" value="Proceed"></center>
            </form>
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