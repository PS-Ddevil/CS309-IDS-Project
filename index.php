<?php
	session_start();
?>
<!-- <?php echo "<script>alert(".$_SESSION['id'].");</script>" ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sabka Dukan</title>
<link rel="icon" href="images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=""/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
<link href="css/ken-burns.css" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider --> 
<link href="css/animate.min.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script> 
<!-- //js --> 
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<!-- web-fonts --> 
<script src="js/owl.carousel.js"></script>  
<script>
$(document).ready(function() { 
	$("#owl-demo").owlCarousel({ 
	  autoPlay: 3000, //Set AutoPlay to 3 seconds 
	  items :4,
	  itemsDesktop : [640,5],
	  itemsDesktopSmall : [480,2],
	  navigation : true
 
	}); 
}); 
</script>
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
<script src="js/bootstrap.js"></script>	
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
		<div class="header-two"><!-- header-two -->
			<div class="container">
				<div class="header-logo">
					<h1><a href="."><span>S</span>abka <i>Dukan</i></a></h1>
				</div>	
				<div class="header-search">
					<form action="search.php" method="get">
						<input type="search" name="search" placeholder="Search for a Product..." required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<i class="fa fa-search" aria-hidden="true"> </i>
						</button>
					</form>
				</div>
				<div class="header-cart">
					<div class="my-account">
						<form action="customer/cart/" method="post" class="last"> 
							<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
						</form> 
					</div>
				</div> 
			</div>		
		</div><!-- //header-two -->
	</div>

	<!-- //header -->	
	<!-- banner -->
	<div class="banner">
		<div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
			<!-- Wrapper-for-Slides -->
            <div class="carousel-inner" role="listbox">  
                <div class="item active"><!-- First-Slide -->
                    <img src="images/5.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h3 data-animation="animated flipInX">Flat <span>50%</span> Discount</h3>
                        <h4 data-animation="animated flipInX">Hot Offer Today Only</h4>
                    </div>
                </div>  
                <div class="item"> <!-- Second-Slide -->
                    <img src="images/8.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h3 data-animation="animated fadeInDown">Our Latest Fashion Editorials</h3>
                        <h4 data-animation="animated fadeInUp">cupidatat non proident</h4>
                    </div>
                </div> 
                <div class="item"><!-- Third-Slide -->
                    <img src="images/3.jpg" alt="" class="img-responsive"/>
                    <div class="carousel-caption kb_caption kb_caption_center">
                        <h3 data-animation="animated fadeInLeft">End Of Season Sale</h3>
                        <h4 data-animation="animated flipInX">cupidatat non proident</h4>
                    </div>
                </div> 
            </div> 
        	<!-- 
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
				<span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
            </a> 
            <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
                 <span class="fs fa-angle-left kb_icons" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
            </a> --> 
        </div>
		<script src="js/custom.js"></script>
	</div>
	<!-- //banner -->  
	<!-- welcome -->
	<div class="welcome"> 
		<div class="container"> 
			<div class="welcome-info">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class=" nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" >
							<i class="fa fa-laptop" aria-hidden="true"></i> 
							<h5>Electronics</h5>
						</a></li>
						<li role="presentation"><a href="#carl" role="tab" id="carl-tab" data-toggle="tab"> 
							<i class="fa fa-female" aria-hidden="true"></i>
							<h5>Fashion</h5>
						</a></li>
						<li role="presentation"><a href="#james" role="tab" id="james-tab" data-toggle="tab"> 
							<i class="fa fa-book-open" aria-hidden="true"></i>
							<h5>Books</h5>
						</a></li>
						<li role="presentation"><a href="#decor" role="tab" id="decor-tab" data-toggle="tab"> 
							<i class="fa fa-home" aria-hidden="true"></i>
							<h5>Home Decor</h5>
						</a></li>
						<li role="presentation"><a href="#sports" role="tab" id="sports-tab" data-toggle="tab"> 
							<i class="fa fa-basketball-ball" aria-hidden="true"></i>
							<h5>Sports</h5>
						</a></li> 
					</ul>
					<div class="clearfix"> </div>
					<h3 class="w3ls-title">Featured Products</h3>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">  
								<script>
									$(document).ready(function() { 
										$("#owl-demo1").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo" class="owl-carousel"> 
								<?php
									include 'connect_no_red.php';
								?>
								<?php
								$view_sql = "CREATE OR REPLACE VIEW product_cumulative AS SELECT product.CategoryID as CategoryID, product.lg_Desp as lg_Desp, product.Sub_Cat as Sub_Cat, product.Picture as Picture, product.PName as PName, product.ProductID as ProductID, product.sm_Desp as sm_Desp, product.Cost as Cost, MAX(seller_prod.Discount) as Discount, COUNT(seller_prod.SellerID) as No_of_Seller, AVG(rating.value) as Rating
								FROM product 
								LEFT JOIN seller_prod ON product.ProductID = seller_prod.ProductID
								LEFT JOIN rating ON rating.ProductID = product.ProductID
								GROUP BY product.ProductID;";
								// echo $view_sql;
								$conn->query($view_sql);
								$sql = "SELECT * FROM product_cumulative WHERE CategoryID ='101' ORDER BY Rating DESC LIMIT 5";
								// echo $sql;
								$re_result = $conn->query($sql);
									while($row = $re_result->fetch_assoc()){
								?>
									<div class="item">
									<div class="glry-w3agile-grids agileits"> 
										<a href="<?php echo "single.php?id=".$row['ProductID'] ?>"><img src="<?php echo "images/".$row['Picture'] ?>" height="150px" alt="img"></a>
										<div class="view-caption agileits-w3layouts">           
											<h4><a href="<?php echo "single.php?id=".$row['ProductID'] ?>"><?php echo $row['PName'] ?></a></h4>
											<p><?php echo $row['sm_Desp'] ?></p>
											<h4>&#x24;<?php echo intval(($row["Cost"]- ($row["Cost"]*$row["Discount"])/100)*100)/100 ?></h4> 	  
										</div>   
									</div>   
									</div>
								<?php
									};
								?>
								</div> 
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="carl" aria-labelledby="carl-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo1").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo1" class="owl-carousel"> 
								<?php
								$sql = "SELECT * FROM product_cumulative WHERE CategoryID ='102' ORDER BY Rating DESC LIMIT 5";
								$re_result = $conn->query($sql);
									while($row = $re_result->fetch_assoc()){
								?>
									<div class="item">
									<div class="glry-w3agile-grids agileits"> 
										<a href="<?php echo "single.php?id=".$row['ProductID'] ?>"><img src="<?php echo "images/".$row['Picture'] ?>" height="150px" alt="img"></a>
										<div class="view-caption agileits-w3layouts">           
											<h4><a href="<?php echo "single.php?id=".$row['ProductID'] ?>"><?php echo $row['PName'] ?></a></h4>
											<p><?php echo $row['sm_Desp'] ?></p>
											<h4>&#x24;<?php echo intval(($row["Cost"]- ($row["Cost"]*$row["Discount"])/100)*100)/100 ?></h4>
										</div>   
									</div>   
									</div>
								<?php
									};
								?>   
								</div>   
							</div>
						</div> 
						<div role="tabpanel" class="tab-pane fade" id="james" aria-labelledby="james-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo2").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo2" class="owl-carousel"> 
								<?php
								$sql = "SELECT * FROM product_cumulative WHERE CategoryID ='103' ORDER BY Rating DESC LIMIT 5";
								$re_result = $conn->query($sql);
									while($row = $re_result->fetch_assoc()){
								?>
									<div class="item">
									<div class="glry-w3agile-grids agileits"> 
										<a href="<?php echo "single.php?id=".$row['ProductID'] ?>"><img src="<?php echo "images/".$row['Picture'] ?>" height="150px" alt="img"></a>
										<div class="view-caption agileits-w3layouts">           
											<h4><a href="<?php echo "single.php?id=".$row['ProductID'] ?>"><?php echo $row['PName'] ?></a></h4>
											<p><?php echo $row['sm_Desp'] ?></p>
											<h4>&#x24;<?php echo intval(($row["Cost"]- ($row["Cost"]*$row["Discount"])/100)*100)/100 ?></h4>
										</div>   
									</div>   
									</div>
								<?php
									};
								?> 
								</div>    
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="decor" aria-labelledby="decor-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo3").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo3" class="owl-carousel"> 
								<?php
								$sql = "SELECT * FROM product_cumulative WHERE CategoryID ='104' ORDER BY Rating DESC LIMIT 5";
								$re_result = $conn->query($sql);
									while($row = $re_result->fetch_assoc()){
								?>
									<div class="item">
									<div class="glry-w3agile-grids agileits"> 
										<a href="<?php echo "single.php?id=".$row['ProductID'] ?>"><img src="<?php echo "images/".$row['Picture'] ?>" height="150px" alt="img"></a>
										<div class="view-caption agileits-w3layouts">           
											<h4><a href="<?php echo "single.php?id=".$row['ProductID'] ?>"><?php echo $row['PName'] ?></a></h4>
											<p><?php echo $row['sm_Desp'] ?></p>
											<h4>&#x24;<?php echo intval(($row["Cost"]- ($row["Cost"]*$row["Discount"])/100)*100)/100 ?></h4> 
										</div>   
									</div>   
									</div>
								<?php
									};
								?>  
								</div>    
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="sports" aria-labelledby="sports-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo4").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										}); 
									}); 
								</script>
								<div id="owl-demo4" class="owl-carousel"> 
								<?php
								$sql = "SELECT * FROM product_cumulative WHERE CategoryID ='105' ORDER BY Rating DESC LIMIT 5";
								$re_result = $conn->query($sql);
								while($row = $re_result->fetch_assoc()){
								?>
									<div class="item">
									<div class="glry-w3agile-grids agileits"> 
										<a href="<?php echo "single.php?id=".$row['ProductID'] ?>"><img src="<?php echo "images/".$row['Picture'] ?>" height="150px" alt="img"></a>
										<div class="view-caption agileits-w3layouts">           
											<h4><a href="<?php echo "single.php?id=".$row['ProductID'] ?>"><?php echo $row['PName'] ?></a></h4>
											<p><?php echo $row['sm_Desp'] ?></p>
											<h4>&#x24;<?php echo intval(($row["Cost"]- ($row["Cost"]*$row["Discount"])/100)*100)/100 ?></h4>  
										</div>   
									</div>   
									</div>
								<?php
									};
								?>
								</div>    
							</div>
						</div> 
					</div>   
				</div>  
			</div>  	
		</div>  	
	</div> 
	<!-- //welcome -->
	<!-- add-products -->
	<div class="add-products"> 
		<div class="container">  
			<div class="add-products-row">
				<div class="w3ls-add-grids">
					<a href="products.php?type=2001"> 
						<h4>TOP FASION TRENDS FOR YOU</h4>
						<h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<div class="w3ls-add-grids w3ls-add-grids-mdl">
					<a href="products.php?type=4001"> 
						<h4>SUNDAY SPECIAL DISCOUNT</h4>
						<h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<div class="w3ls-add-grids w3ls-add-grids-mdl1">
					<a href="products.php?type=1002"> 
						<h4>LATEST DESIGNS FOR YOU <span> Hurry !</span></h4>
						<h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<div class="clerfix"> </div>
			</div>  	
		</div>  	
	</div>
	<!-- //add-products -->
	<!-- coming soon -->
	<div class="soon">
		<div class="container">
			<h3>Mega Deal Of the Week</h3>
			<h4>Coming Soon Don't Miss Out</h4>  
			<div id="countdown1" class="ClassyCountdownDemo"></div>
		</div> 
	</div>
	<!-- //coming soon -->
	<!-- deals -->
	<div class="deals"> 
		<div class="container"> 
			<h3 class="w3ls-title">DEALS OF THE DAY </h3>
			<div class="deals-row">
				<div class="col-md-3 focus-grid"> 
					<a href="products.php?type=1001" class="wthree-btn"> 
						<div class="focus-image"><i class="fa fa-mobile"></i></div>
						<h4 class="clrchg">Mobiles</h4> 
					</a>
				</div>
				<div class="col-md-3 focus-grid"> 
					<a href="products.php?type=1007" class="wthree-btn wthree1"> 
						<div class="focus-image"><i class="fa fa-laptop"></i></div>
						<h4 class="clrchg"> Laptop</h4> 
					</a>
				</div> 
				<div class="col-md-3 focus-grid"> 
					<a href="products.php?type=1005" class="wthree-btn wthree2"> 
						<div class="focus-image"><i class="fa fa-tv"></i></div>
						<h4 class="clrchg">Television</h4>
					</a>
				</div> 
				<div class="col-md-3 focus-grid"> 
					<a href="products.php?type=5001" class="wthree-btn wthree3"> 
						<div class="focus-image"><i class="fa fa-volleyball-ball"></i></div>
						<h4 class="clrchg">Bat</h4>
					</a>
				</div> 
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products.php?type=3001" class="wthree-btn wthree3"> 
						<div class="focus-image"><i class="fa fa-book"></i></div>
						<h4 class="clrchg">Books</h4> 
					</a>
				</div>
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products.php?type=4002" class="wthree-btn wthree4"> 
						<div class="focus-image"><i class="fa fa-clock"></i></div>
						<h4 class="clrchg">Clock</h4>
					</a>
				</div>
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products.php?type=2004" class="wthree-btn wthree2"> 
						<div class="focus-image"><i class="fa fa-shoe-prints"></i></div>
						<h4 class="clrchg">Shoes</h4>
					</a>
				</div> 
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products.php?type=1006" class="wthree-btn wthree"> 
						<div class="focus-image"><i class="fa fa-camera"></i></div>
						<h4 class="clrchg">Camera</h4>
					</a>
				</div> 
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products.php?type=4001" class="wthree-btn wthree5"> 
						<div class="focus-image"><i class="fa fa-paint-brush"></i></div>
						<h4 class="clrchg">Art</h4> 
					</a>
				</div> 
				<div class="col-md-2 focus-grid w3focus-grid-mdl"> 
					<a href="products.php?type=5002" class="wthree-btn wthree1"> 
						<div class="focus-image"><i class="fa fa-tshirt"></i></div>
						<h4 class="clrchg">Jersey</h4> 
					</a>
				</div> 
				<div class="clearfix"> </div>
			</div>  	
		</div>  	
	</div> 
	<!-- //deals --> 
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
					<li><a href="#" class="fab fa-facebook-square icon facebook"> </a></li>
					<li><a href="#" class="fab fa-twitter icon twitter"> </a></li>
					<li><a href="#" class="fab fa-google-plus icon googleplus"> </a></li>
					<li><a href="#" class="fab fa-dribbble icon dribbble"> </a></li>
					<li><a href="#" class="fas fa-rss icon rss"> </a></li> 
				</ul> 
				<ul class="apps"> 
					<li><h4>Download Our app : </h4> </li>
					<li><a href="#" class="fab fa-apple"></a></li>
					<li><a href="#" class="fab fa-windows"></a></li>
					<li><a href="#" class="fab fa-android"></a></li>
				</ul> 
			</div> 
			<div class="col-md-6">
				<h3>Are you a seller?</h3>
				<br>
				<a class="btn btn-primary" href="seller/">Click Here</a>
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
						<h2><a href="."><span>S</span>abka <i>Dukan</i></a></h2>
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
				</div>
			</div>
		</div>
	</div>
	<!-- //footer -->		
	<div class="copy-right"> 
		<div class="container">
			<p>© 2019 Sabka Dukan . All rights reserved</a></p>
		</div>
	</div> 
		<!-- countdown.js -->	
	<script src="js/jquery.knob.js"></script>
	<script src="js/jquery.throttle.js"></script>
	<!-- menu js aim -->
	<script src="js/jquery.menu-aim.js"> </script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster --> 
</body>
</html>