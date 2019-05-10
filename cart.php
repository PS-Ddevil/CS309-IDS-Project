<!DOCTYPE html>
<html lang="en">
<head>
<title>Sabka Bazaar</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/animate.min.css" rel="stylesheet" type="text/css" media="all" /><!-- animation -->
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style -->   
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<style>
    body{
        background-color: red;
    }
</style>
<script src="js/jquery-2.2.3.min.js"></script> 
<script src="js/jquery-scrolltofixed-min.js" type="text/javascript"></script><!-- fixed nav js -->
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
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
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
	<!-- header -->
	<div class="header">
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-right">
				<ul>
					<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> My Account<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="login.php">Login </a></li>  
							<li><a href="login.php">My Orders</a></li>
						</ul> 
					</li>  
					<li class="dropdown head-dpdn">
						<a href="help.php" class="dropdown-toggle"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
					</li>
					<li class="dropdown head-dpdn">
						<a href="signup.php" class="dropdown-toggle"><i class="fa fa-question-circle" aria-hidden="true"></i> Sign Up</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div> 
		</div>
	</div>
	<!-- //header --> 
    <?php
        include 'connect.php';
    ?>
    <div class="container" style="padding-top:50px">
    <div class="row">
    <?php
    // $sql = "SELECT * FROM ".$cart." WHERE customerid=".$_SESSION['id'].";";
    $sql = "SELECT cart.quantity as quantity , product.ProductID as prodid ,product.PName as name, product.Cost as mrp, product.Discount as discount, product.Picture as pic
    FROM product
    INNER JOIN cart ON product.ProductID=cart.ProductID and cart.CustomerID=".$_SESSION['id'].";"; 
    // echo $sql;
    $re_result = $conn->query($sql);
        while($row = $re_result->fetch_assoc()){
    ?> 	
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card" style="background-color: white; @media screen and (max-width: 575px){.card{width: 85%;margin-left: 7.5%;margin-bottom: 20px;}}@media screen and (min-width: 575px){.card{width: 95%;margin-left: 2.5%;margin-bottom: 20px;}">
            <img class="card-img-top" src="<?php echo "images/".$row['pic'] ?>" alt="<?php echo $row['PName'] ?>" style="width:100%">
            <div class="card-body">
            <h4 class="card-title"><a href="<?php echo "single.php?id=".$row['prodid'] ?>"><?php echo $row['name'] ?></a></h4>
            <p class="card-text">Price: &#x24;<?php echo intval(($row["mrp"]- ($row["mrp"]*$row["discount"])/100)*0.014) ?></p>
            <p>Quantity: <?php echo $row['quantity'] ?></p>
            <form action="<?php echo 'remove.php?prodid='.$row['prodid']?>" method="post">
                <input type="submit" value="Remove">
            </form>
            </div>
            </div>
        </div>
    <?php
        };
    ?>
    </div>
    </div>
	<!-- menu js aim -->
	<script src="js/jquery.menu-aim.js"> </script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>