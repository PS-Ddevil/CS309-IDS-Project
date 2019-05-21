<?php
	session_start();
	if(isset($_SESSION['cmpid'])){
		header("location: .");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sabka Bazaar</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- web-fonts -->  
</head>
<body> 
    <center><img src="images/oops-pic.png" width="20%" style="margin-top:5%"></img></center>
    <div class="container">
        <div class="jumbotron">
            <h3><center>Signup Error</center></h3>
            <center><p>Signup with Invalid Data. Please enter correct/valid data<a href="signup.php"> Go to Signup page</a></p></center>
        </div>
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>