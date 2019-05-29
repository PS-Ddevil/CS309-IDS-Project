<?php
	session_start();
	if(isset($_SESSION['id'])){
		if(isset($_SESSION['count1'])){
			if($_SESSION['count1'] != 0){
				header("location: ../");
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sabka Dukan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="../css/animate.min.css" rel="stylesheet" type="text/css" media="all" /><!-- animation -->
<link href="../css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style -->  
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="../js/jquery-2.2.3.min.js"></script> 
<script src="../js/jquery-scrolltofixed-min.js" type="text/javascript"></script><!-- fixed nav js -->
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner. This is the default behaviour.

        $('.header-two').scrollToFixed();  
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header-two').outerHeight(true) + 10, 
                zIndex: 999
            });
        });
    });
</script>
<!-- //js --> 
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'> 
<!-- web-fonts -->  
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
</head>
<body>
	<!-- sign up-page -->
	<div class="login-page">
		<div class="container"> 
			<center><a href="../"><img src="../images/logo.png" width="150px"></a><center><br><br>
			<h3 class="w3ls-title w3ls-title1">Create your account</h3>  
			<div class="login-body">
				<form action="submit.php" method="post" enctype="multipart/form-data">
					<label for="name" style="float:left">Name:</label>
					<input type="text" id="name" class="user" name="name" placeholder="Enter your Name" required>
					<label for="email" style="float:left">Email:</label>
					<input type="text" id="email" class="user" name="email" placeholder="Enter your email" required>
					<label for="image" style="float:left">Photo:</label>					
   					<input id="image" name="image" type="file"/>
					<label for="address" style="float:left">Address:</label>
					<input type="text" id="address" class="user" name="address" placeholder="Enter your address" required>
					<label for="bill-add" style="float:left">Billing Address:</label>
					<input type="text" id="bill-add" class="user" name="billadd" placeholder="Enter your Billing Address" required>
					<label for="phno" style="float:left">Phone Number:</label>
					<input type="text" id="phno" class="user" name="phno" placeholder="Enter your Phone Number" required>
					<!--<label for="crno" style="float:left">Credit Card:</label>
					<input type="text" id="crno" class="user" name="crno" placeholder="Enter your Credit Card No" required>-->
					<label for="passsword" style="float:left">Password:</label>
					<input type="password" id="password" name="password" class="lock" placeholder="Password" required>
					<!--<label for="type" style="float:left">Card Type:</label>
					<select name="type" id="type" required>
						<option value="visa">Visa</option>
						<option value="rupay">Rupay</option>
					</select>-->
					<input type="submit" value="Sign Up ">
				</form>
			</div>  
			<h6>Already have an account? <a href="login.php">Login Now »</a> </h6>  
		</div>
	</div>
	<!-- //sign up-page -->   
	<!-- menu js aim -->
	<script src="../js/jquery.menu-aim.js"> </script>
	<script src="../js/main.js"></script> <!-- Resource jQuery -->
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/bootstrap.js"></script>
</body>
</html>