<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("location: ../");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sabka Dukan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body> 
    <center><img src="../images/thanks.jpg" width="20%" style="margin-top:5%"></img></center>
    <div class="container">
        <div class="jumbotron">
            <h3><center>Thank You</center></h3>
            <center><p><a href="../"> Go to home page</a></p></center>
        </div>
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/bootstrap.js"></script>
</body>
</html>