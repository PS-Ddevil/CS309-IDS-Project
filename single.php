<?php
	include "connect.php";
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
<link href="css/animate.min.css" rel="stylesheet" type="text/css" media="all" /><!-- animation -->
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style -->   
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script> 
<script src="js/owl.carousel.js"></script>
<script src="js/bootstrap.js"></script>
<!--flex slider-->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
	});
</script>
<!--flex slider-->
<script src="js/imagezoom.js"></script>
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
		<div class="container">
		<div class="header-logo">
			<h1><a href="."><span>S</span>abka <i>Dukan</i></a></h1>
		</div>
		</div>
		<!-- //header -->
		<!-- PHP-->
		<?php
				$view_sql = "CREATE OR REPLACE VIEW product_cumulative AS SELECT product.CategoryID as CategoryID, product.lg_Desp as lg_Desp, product.Sub_Cat as Sub_Cat, product.Picture as Picture, product.PName as PName, product.ProductID as ProductID, product.sm_Desp as sm_Desp, product.Cost as Cost, MAX(seller_prod.Discount) as Discount, COUNT(seller_prod.SellerID) as No_of_Seller, AVG(rating.value) as Rating
				FROM product 
				LEFT JOIN seller_prod ON product.ProductID = seller_prod.ProductID
				LEFT JOIN rating ON rating.ProductID = product.ProductID
				GROUP BY product.ProductID;";
				$conn->query($view_sql);
				$sql = "SELECT * FROM `product_cumulative` WHERE ProductID = ".$_GET['id'].";";
				$sql2 = "SELECT * FROM ".$rating_tbl." WHERE ProductID = ".$_GET['id']." ORDER BY Time DESC;";
				$sql3 = "SELECT AVG(Value) AS avg, Count(RatingID) as tot FROM ".$rating_tbl." WHERE ProductID = '".$_GET['id']."';";
				$result = $conn->query($sql);
				$result2 = $conn->query($sql2);
				$result3 = $conn->query($sql3);
				$row = $result->fetch_assoc();
				$row3 = $result3->fetch_assoc();
    ?> 
		<!-- //PHP-->
		<!-- breadcrumbs --> 
	<div class="container" style="margin-top: 40px"> 	
		<ol class="breadcrumb breadcrumb1">
			<li><a href=".">Home</a></li>
			<li><a href="<?php echo 'products.php?type='.$row['Sub_Cat']?>">Products</a></li>
			<li class="active"><?php echo $row['PName'] ?></li>
		</ol> 
		<div class="clearfix"> </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- products -->
	<div class="products">	 
		<div class="container">  
			<div class="single-page">
				<div class="single-page-row" id="detail-21">
					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<div class="thumb-image detail_images"> <img src="<?php echo 'images/'.$row['Picture'] ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</ul>
						</div>
					</div>
					<div class="col-md-6 single-top-right">
						<h3 class="item_name"><?php echo $row['PName'] ?></h3>
						<p>Processing Time: Item will be shipped out within 2-3 working days. </p>
						<div class="single-rating">
							<ul>
								<?php
									for ($x = 0; $x < $row3['avg']; $x++) {
								?>
								<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								<?php
									};
								?>
								<li class="rating"><?php echo $row3['tot'] ?> reviews</li>
							</ul> 
						</div>
						<div class="single-price">
							<ul>
								<li>&#x24;<?php echo intval(($row["Cost"]- ($row["Cost"]*$row["Discount"])/100)*100)/100 ?></li>  
								<?php if($row['Discount'] != 0) { ?>
								<li><del>&#x24;<?php echo intval($row["Cost"]*100)/100 ?></del></li> 
								<li><span class="w3off"><?php echo $row['Discount'] ?>% OFF</span></li> 
								<?php }?>
								<li>Ends on: June,5th</li>
							</ul>	
						</div> 
						<p class="single-price-text"><?php echo $row['lg_Desp']?></p>
						<?php if($row['No_of_Seller'] != 0) { ?>
						<form action="<?php echo 'customer/cart/addtocart.php?prodid='.$row['ProductID']?> " method="post">
						<label>Select Vendor:</label><br>
							<?php 
								$sql_seller = "SELECT seller_prod.SellerID as SID, seller_prod.Quantity as Quan, seller_prod.Discount as Dis, seller.Username as Name, AVG((seller_rating.Shipping + seller_rating.Packaging + seller_rating.Quality + seller_rating.Customer_Care)/4) as avg 
								FROM seller_prod
								LEFT JOIN seller ON seller.SellerID = seller_prod.SellerID
								LEFT JOIN seller_rating ON seller.SellerID = seller_rating.SellerID
								WHERE seller_prod.ProductID = ".$_GET['id']."
								AND seller_prod.Quantity > 0
								GROUP BY seller_prod.SellerID
								ORDER BY Dis DESC;";
								// echo $sql_seller;
								$result_seller = $conn->query($sql_seller);
							?>
							<?php
								while($row_sell = $result_seller->fetch_assoc()){
							?>
								<input onclick="sellerchange()" quan = "<?php echo $row_sell['Quan'] ?>" type="radio" name="seller" value="<?php echo $row_sell['SID']?>"><?php echo $row_sell['Name']." (avg) @".intval(($row["Cost"]- ($row["Cost"]*$row_sell["Dis"])/100)*100)/100?> <br>
							<?php } ?>
							<label id="quan_label" style="display:none">Quantity:</label>
							<input style="display:none" type="number" id="quantity" class="user" name="quantity" value="1" min="1" required>
							<button style="display:none" id="quan_sub" type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
						</form>
						<?php }else{?>
							<h2 style="color:red">No stock Available</h2>
						<?php } ?>
					</div>
				   <div class="clearfix"> </div>  
				</div>
				<div class="single-page-icons social-icons"> 
					<ul>
						<li><h4>Share on</h4></li>
						<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
						<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
						<li><a href="#" class="fa fa-rss icon rss"> </a></li> 
					</ul>
				</div>
			</div> 
			<!-- recommendations -->
			<div class="recommend">
				<h3 class="w3ls-title">Our Recommendations </h3> 
				<script>
					$(document).ready(function() { 
						$("#owl-demo5").owlCarousel({
					 
						  autoPlay: 3000, //Set AutoPlay to 3 seconds
					 
						  items :4,
						  itemsDesktop : [640,5],
						  itemsDesktopSmall : [414,4],
						  navigation : true
					 
						});
						
					}); 
				</script>
				<div id="owl-demo5" class="owl-carousel">
					 	<?php
							$sql = "SELECT * FROM `product_cumulative` WHERE Sub_Cat = ".$row['Sub_Cat']." AND ProductID <> ".$_GET['id']." ORDER BY Rating DESC LIMIT 4;";
							$re_result = $conn->query($sql);
							// echo $sql;
							while($row4 = $re_result->fetch_assoc()){
						?>
							<div class="item">
								<div class="glry-w3agile-grids agileits"> 
									<a href="<?php echo 'single.php?id='.$row4['ProductID'] ?>"><img src="<?php echo 'images/'.$row4['Picture'] ?>" alt="<?php echo $row['PName'] ?>" height="200px"></a>
									<div class="view-caption agileits-w3layouts">           
										<h4><a href="<?php echo 'single.php?id='.$row4['ProductID'] ?>"><?php echo $row4['PName'] ?></a></h4>
										<p><?php echo $row4['sm_Desp'] ?></p>
										<h4>&#x24;<?php echo intval(($row["Cost"]- ($row["Cost"]*$row["Discount"])/100)*100)/100 ?></h4>
									</div>        
								</div> 
							</div> 
						<?php
							};
						?>
				</div>    
			</div>
			<!-- //recommendations --> 
			<!-- collapse-tabs -->
			<div class="collpse tabs">
				<h3 class="w3ls-title">About this item</h3> 
				<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<i class="fa fa-file-text-o fa-icon" aria-hidden="true"></i> Description <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php echo $row['lg_Desp']?>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<a class="collapsed pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<i class="fa fa-check-square-o fa-icon" aria-hidden="true"></i> reviews (<?php echo $row3['tot'] ?>) <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<?php
									while($row2 = $result2->fetch_assoc()){ 
								?>
									<p>Constumer: <?php echo $row2['UserID'] ?> </p>
									<p>
										Rating:
											<?php
												for ($x = 0; $x < $row2['Value']; $x++) {
											?>
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<?php
												};
											?>
									</p>
									<p>Comment: <?php echo $row2['Comment'] ?> </p>
									<hr>
								<?php
									};
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //collapse --> 
			<!-- offers-cards --> 
			<div class="w3single-offers offer-bottom"> 
				<div class="col-md-6 offer-bottom-grids">
					<div class="offer-bottom-grids-info2">
						<h4>Special Gift Cards</h4> 
						<h6>More brands, more ways to shop. <br> Check out these ideal gifts!</h6>
					</div>
				</div>
				<div class="col-md-6 offer-bottom-grids">
					<div class="offer-bottom-grids-info">
						<h4>Flat $10 Discount</h4> 
						<h6>The best Shopping Offer <br> On Fashion Store</h6>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //offers-cards -->
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
				<h4>Sign up for email and get 25%off!</h4> 
				<form action="#" method="post"> 
					<input type="text" name="email" placeholder="Enter your Email..." required="">
					<input type="submit" value="Subscribe">
				</form>
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
						<h2><a href="index.php"><span>S</span>abka <i>Dukan</i></a></h2>
						<h6>Your stores. Your place.</h6>
					</div>
					<ul>
						<li><i class="fa fa-map-marker"></i> IIT Mandi, Kamand, Himachal Pradesh</li>
						<li><i class="fa fa-mobile"></i> 7355414418 </li>
						<li><i class="fa fa-phone"></i> +917355414418 </li>
						<li><i class="fa fa-envelope"></i> <a href="mailto:example@mail.com"> mail@example.com</a></li>
					</ul> 
				</div>
				<div class="col-md-8 address-right">
					<div class="col-md-4 footer-grids">
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<script>
		function sellerchange(){
			var max_val = document.querySelector('input[name="seller"]:checked').getAttribute("quan");
			document.getElementById("quantity").setAttribute("max", max_val);
			document.getElementById('quantity').style.display = "block";
			document.getElementById('quan_label').style.display = "block";
			document.getElementById('quan_sub').style.display = "block"; 
		} 
	</script>
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
</body>
</html>