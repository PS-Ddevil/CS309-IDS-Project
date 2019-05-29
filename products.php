<?php
	session_start();
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
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style -->  
<link href="css/animate.min.css" rel="stylesheet" type="text/css" media="all" />   
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script> 
<script src="js/owl.carousel.js"></script>
<!-- //js --> 
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<!-- web-fonts --> 
<!-- scroll to fixed--> 
<script src="js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
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
<!-- //scroll to fixed--> 
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
<!-- //smooth-scrolling-of-move-up -->  
<!-- the jScrollPane script -->
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" id="sourcecode">
	$(function()
	{
		$('.scroll-pane').jScrollPane();
	});
</script>
<!-- //the jScrollPane script -->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<!-- the mousewheel plugin --> 
</head>
<body>
	<!-- header -->
	<div class="header">
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-right">
			<ul> 
					<?php if(isset($_SESSION['id'])){ ?>
						<li class="dropdown head-dpdn">
							<a href="customer/dashboard.php" class="dropdown-toggle">Dashboard</a>
						</li>
						<li class="dropdown head-dpdn">
							<form action="auth/signout.php" method="post">
								<button class="dropdown-toggle" style="background-color: Transparent;background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none; color:white">Sign Out</button>
							</form>
						</li>
					<?php } else { ?>
						<li class="dropdown head-dpdn">
							<a href="auth/login.php" class="dropdown-toggle">Login</a>
						</li>
						<li class="dropdown head-dpdn">
							<a href="auth/signup.php" class="dropdown-toggle">Sign Up</a>
						</li>
					<?php }; ?>
				</ul>
			</div>
			<div class="clearfix"> </div> 
		</div>
	</div>
	<!-- //header --> 
	<!-- PHP -->
	<?php
		include "connect_no_red.php";
		$product_id = $_GET['type'];
		$view_sql = "CREATE OR REPLACE VIEW product_cumulative AS SELECT product.CategoryID as CategoryID, product.lg_Desp as lg_Desp, product.Sub_Cat as Sub_Cat, product.Picture as Picture, product.PName as PName, product.ProductID as ProductID, product.sm_Desp as sm_Desp, product.Cost as Cost, MAX(seller_prod.Discount) as Discount, COUNT(seller_prod.SellerID) as No_of_Seller, AVG(rating.value) as Rating
		FROM product 
		LEFT JOIN seller_prod ON product.ProductID = seller_prod.ProductID
		LEFT JOIN rating ON rating.ProductID = product.ProductID
		GROUP BY product.ProductID;";
		$conn->query($view_sql);
		$sql = "SELECT * FROM product_cumulative WHERE Sub_Cat = ".$product_id." ORDER BY Rating ;";
		$sql2 = "SELECT Sub_Name FROM ".$product_sub_cat." WHERE Sub_Cat = ".$product_id.";";
		$re_result = $conn->query($sql);
		$result = $conn->query($sql2);
		$row_p = $result->fetch_assoc();
		$page_ref = $row_p['Sub_Name'];
	?>	
	<!-- products -->
	<div class="products">	 
		<div class="container">
			<div class="header-logo">
				<h1><a href="."><span>S</span>abka <i>Dukan</i></a></h1>
			</div>	
			<div class="col-md-12 product-w3ls-right">
				<!-- breadcrumbs --> 
				<ol class="breadcrumb breadcrumb1">
					<li><a href=".">Home</a></li>
					<li class="active"><?php echo $page_ref ?></li>
				</ol> 
				<div class="clearfix"> </div>
				<div class="products-row">
					<?php 
						while($row = $re_result->fetch_assoc()){
					?>
					<div class="col-md-4 product-grids">
						<div class="agile-products">
							<!-- <div class="new-tag"><h6>New</h6></div> -->
							<div style="min-height:200px"><a href="<?php echo 'single.php?id='.$row['ProductID'] ?>"><img src="<?php echo "images/".$row['Picture'] ?>" class="img-responsive" alt="img"></a></div>
							<div class="agile-product-text">              
								<h5><a href="single.php"><?php echo $row["PName"] ?></a></h5> 
								<h6><del>&#x24;<?php echo intval($row["Cost"]*100)/100 ?></del> &#x24;<?php echo intval(($row["Cost"]- ($row["Cost"]*$row["Discount"])/100)*100)/100 ?></h6> 
							</div>
						</div>
					</div>
					<?php
						}; 
					?>
					<div class="clearfix"> </div>
				</div>
				<!-- add-products --> 
				<div class="w3ls-add-grids w3agile-add-products">
					<a href="#"> 
						<h4>TOP 10 TRENDS FOR YOU FLAT <span>20%</span> OFF</h4>
						<h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div> 
				<!-- //add-products -->
			</div>
		</div>
	</div>
	<!--//products-->  
	<!-- footer-top -->
	<div class="w3agile-ftr-top">
		<div class="container">
			<div class="ftr-toprow">
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>FREE DELIVERY</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>CUSTOMER CARE</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
					</div> 
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>GOOD QUALITY</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
					</div>
					<div class="clearfix"> </div>
				</div> 
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //footer-top -->  
	<!-- subscribe -->
	<div class="subscribe"> 
		<div class="container">
			<div class="col-md-6 social-icons w3-agile-icons">
				<h4>Keep in touch</h4>  
				<ul>
					<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
					<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
					<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
					<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
					<li><a href="#" class="fa fa-rss icon rss"> </a></li> 
				</ul>
				<ul class="apps"> 
					<li><h4>Download Our app : </h4> </li>
					<li><a href="#" class="fa fa-apple"></a></li>
					<li><a href="#" class="fa fa-windows"></a></li>
					<li><a href="#" class="fa fa-android"></a></li>
				</ul>
			</div> 
			<div class="col-md-6 subscribe-right">
				<div class="clearfix"> </div> 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //subscribe --> 
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-info w3-agileits-info">
				<div class="col-md-4 address-left agileinfo">
					<div class="footer-logo header-logo">
						<h2><a href="."><span>S</span>mart <i>Dukan</i></a></h2>
						<h6>Your stores. Your place.</h6>
					</div>
					<ul>
						<li><i class="fa fa-map-marker"></i> IIT Mandi, Kamand, Himachal Pradesh</li>
						<li><i class="fa fa-mobile"></i> 7355414418 </li>
						<li><i class="fa fa-phone"></i> +917355414418 </li>
						<li><i class="fa fa-envelope"></i> <a href="mailto:example@mail.com"> mail@example.com</a></li>
					</ul> 
				</div>
				<div class="col-md-8 address-right" style="height: 170px">
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //footer --> 		
	<div class="copy-right"> 
		<div class="container">
			<p>©2019 Sabka Dukan . All rights reserved</a></p>
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