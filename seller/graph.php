<?php
	session_start();
	include "../connect_no_red.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Performance</title>
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
      <div class="container">
        <center><h2><b>Performance</b></h2></center>
        <br>
        <div><center id="columnchart"></center></div>
      </div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      <?php
        $sql1 = "SELECT Username FROM seller WHERE SellerID = ".$_SESSION['cmpid'].";";
        $name_res = $conn->query($sql1);
        $row_res = $name_res->fetch_assoc();
			  $sql = "SELECT AVG(Shipping) as ship, AVG(Quality) as qual, AVG(Packaging) as pack, AVG(Customer_Care) as cc from seller_rating WHERE SellerID = ".$_SESSION['cmpid'].";";
        $sql_avg = "SELECT AVG(Shipping) as ship, AVG(Quality) as qual, AVG(Packaging) as pack, AVG(Customer_Care) as cc from seller_rating ;";
        // echo $sql_avg;
        $res_avg = $conn->query($sql_avg);
        $row_avg =  $res_avg->fetch_assoc();
        $result = $conn->query($sql);
			  $row = $result->fetch_assoc();
      ?>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Values', "<?php echo $row_res['Username'] ?>", "Average" ]
        ,["Shipping", <?php echo $row['ship'] ?>, <?php echo $row_avg['ship'] ?> ]
        ,["Quality", <?php echo $row['qual'] ?>, <?php echo $row_avg['qual'] ?> ]
        ,["Packaging", <?php echo $row['pack'] ?>, <?php echo $row_avg['pack'] ?> ]
        ,["Customer_Care", <?php echo $row['cc'] ?>, <?php echo $row_avg['cc'] ?> ]
       ]);

        var options = {
          title: 'Rating Out of 10 of Seller',
          pieHole: 0.5,
          width: 600,
          height: 400,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none'
        };
        var chart = new google.charts.Bar(document.getElementById("columnchart"));
        chart.draw(data, google.charts.Bar.convertOptions(options));
        }

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