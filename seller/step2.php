<?php
	session_start();
    include "connect.php";
    if(!isset($_SESSION['cmpid'])){
        header("location: login.php");
    }
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
            <form action="insert_pdt.php" method="post" id="form" enctype="multipart/form-data">
            <center style="margin-top: 1%; padding-top: 20px; padding-bottom: 40px; font-size: 25px; color: white"><span>Fill-in Details</span></center>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="PName" type="text" placeholder="Type Product Name" name="PName" required/>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="Discount" type="text" placeholder="Discount Percentage" name="Discount" required/>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="Cost" type="text" placeholder="Original Cost" name="Cost" required/>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="Quan" type="text" placeholder="Quantity" name="Quan" required/>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="sm_desp" type="text" placeholder="Small Description" name="sm_Description" required/>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="lg_desp" type="text" placeholder="Details" name="lg_Description" required/>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input id="image" name="image" type="file" style="border:none; color: white" required/>
            </div>
            <span class="txt" style="display:none">CategoryID</span>
            <input class="box" id="CategoryID" name="CategoryID" type="hidden" value="<?php echo $_GET['type']?>"/>
            <div class="wrap-input100 validate-input">
                <span class="txt" style="color:white">Sub-Category</span>
                <select class="input100" id="Sub_Cat" name="Sub_Cat" style="border: none"/>
                    <?php
                        include "../connect.php";
                        $cat_data = $_GET[cat];
                        $sql = "SELECT * FROM ".$product_sub_cat." WHERE CategoryID= ".$cat_data.";";
                        echo $sql;
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()){
                    ?>
                        <option value="<?php echo $row['Sub_Cat']?>"><?php echo $row['Sub_Name']?></option>
                    <?php 
                        };
                    ?>
                </select>
            </div>
            
            <br>
            <center><input id="btn" type="submit" class="btn btn-outline-light"></center>
        </form>
			</div>
		</div>
	</div>	

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
    <script>
        var x = "<?php echo $_GET[cat] ?>";
        document.getElementById("CategoryID").value = x;
    </script>
<!--===============================================================================================-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
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