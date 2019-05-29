<?php
    session_start();
    if(!isset($_SESSION['id'])){
		header("location: ../../auth/login.php");
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
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="../../css/animate.min.css" rel="stylesheet" type="text/css" media="all" /><!-- animation -->
<link href="../../css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style -->   
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="../../css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<style>
    body{
        background-color: white;
    }
</style>
<script src="../../js/jquery-2.2.3.min.js"></script> 
<script src="../../js/jquery-scrolltofixed-min.js" type="text/javascript"></script><!-- fixed nav js -->
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
<script type="text/javascript" src="../../js/move-top.js"></script>
<script type="text/javascript" src="../../js/easing.js"></script>	
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
                <?php if(isset($_SESSION['id'])){ ?>
                    <li class="dropdown head-dpdn">
                        <a href="../dashboard.php" class="dropdown-toggle">Dashboard</a>
                    </li>
                    <li class="dropdown head-dpdn">
                        <form action="../../auth/signout.php" method="post">
                            <button class="dropdown-toggle" style="background-color: Transparent;background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none; color:white">Sign Out</button>
                        </form>
                    </li>
                <?php } else { ?>
                    <li class="dropdown head-dpdn">
                        <a href="../../auth/login.php" class="dropdown-toggle">Login</a>
                    </li>
                    <li class="dropdown head-dpdn">
                        <a href="../../auth/signup.php" class="dropdown-toggle">Sign Up</a>
                    </li>
                <?php }; ?>
            </ul>
			</div>
			<div class="clearfix"> </div> 
		</div>
	</div>
	<!-- //header --> 
    <?php
        include '../../connect.php';
    ?>
    <div class="container" style="padding-top:50px">
    <center><a href="../../"><img src="../../images/logo.png" width="150px"></a><center><br><br>
    <h1><b>Cart</b></h1>
    <?php
    $sql = "SELECT seller.Username as sname, cart.SellerID as seller, cart.quantity as quantity , product.ProductID as prodid ,product.PName as name, product.Cost as mrp, seller_prod.Discount as discount, Picture as pic
    FROM product
    INNER JOIN cart ON product.ProductID=cart.ProductID and cart.CustomerID=".$_SESSION['id'].
    " INNER JOIN seller_prod ON seller_prod.SellerID = cart.SellerID and cart.ProductID = seller_prod.ProductID
    INNER JOIN seller ON cart.SellerID = seller.SellerID;"; 
    // echo $sql;
    $re_result = $conn->query($sql);
    if($row = $re_result->fetch_assoc() == ""){ ?>
        <div class="jumbotron">
            <div class="container">
            <h3 class="display-4">You currently do not have any product in your cart</h3><br>
            <p class="lead"><a href="../../">Continue Shopping</a></p>
            </div>
        </div>
    <?php }
    else {
        $re_result = $conn->query($sql);
        while($row = $re_result->fetch_assoc()){
    ?> 	
        <div class="jumbotron">
            <div class="container">
            <div class="row">
            <div class="col-lg-4 col-md-4"><center><img src="<?php echo "../".$row['pic'] ?>" alt="<?php echo $row['PName'] ?>" height="100px"><center></div>
            <div class="col-lg-4 col-md-8">
            <a href="<?php echo "../../single.php?id=".$row['prodid'] ?>"><h2><?php echo $row['name'] ?></h2></a></br>
            <span><b>Sold by </b> <?php echo $row['sname'] ?></span><br>
            <span><b>Price:</b> &#x24;<?php echo intval(($row["mrp"]- ($row["mrp"]*$row["discount"])/100)*100)/100 ?> X <?php echo $row['quantity'] ?> = &#x24;<?php echo (intval(($row["mrp"]- ($row["mrp"]*$row["discount"])/100)*100)/100)*($row['quantity']) ?> </span></br>
            <span><b>Quantity:</b> <?php echo $row['quantity'] ?></span>
            <form action="remove.php" method="post">
                <input type="hidden" name="prodid" value="<?php echo $row['prodid']?>" />
                <input type="hidden" name="sid" value="<?php echo $row['seller']?>" />
                <input type="submit" value="Remove">
            </form>
            </div>
            </div>
            </div>
        </div>
    <?php
        }
    ?>
        <div class="container">
            <form action="../../payment/" method="post">
                <center><input type="submit" value="Proceed to Pay"></center>
            </form>
        </div>
        <br><br>
        <div class="container">
            <form action="../../" method="post">
                <center><input type="submit" value="Back to Home"></center>
            </form>
        </div>
    <?php
    }
    ?>
    </div>
	<!-- menu js aim -->
	<script src="../../js/jquery.menu-aim.js"> </script>
	<script src="../../js/main.js"></script> <!-- Resource jQuery -->
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/bootstrap.js"></script>
</body>
</html>