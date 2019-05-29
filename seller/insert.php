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
            <form action="" method="post" id="form" enctype="multipart/form-data">
			<center style="margin-top: 1%; padding-top: 20px; padding-bottom: 40px; font-size: 25px; color: white"><span>Fill-In Form</span></center>
                <center><a id="btn" class="btn btn-outline-light" style="color:white" href="old_add.php">Already Existing Product</a></center>
				<br><hr><br>
				<center style="font-size: 20px; color: white"><span>Add a New Product</span></center>
				<br><br>
				<span class="txt" style="color:white">Category</span>
                <select class="box" id="cat" name="genre" onchan/>
                    <?php
                        $sql = "SELECT * FROM ".$product_cat.";";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()){
                    ?>
                        <option value="<?php echo $row['CategoryID']?>"><?php echo $row['CategoryName']?></option>
                    <?php 
                        };
                    ?>
                </select>
                <br><br>
                <center><input class="btn btn-outline-light" type="submit" value="Proceed"></input></center>
            </form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
	<script>
        document.getElementById("form").addEventListener("submit", function(e) {
            e.preventDefault();
            var cat_data = document.getElementById('cat').value;
            window.location.href="step2.php?cat="+cat_data;
        });
    </script>
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