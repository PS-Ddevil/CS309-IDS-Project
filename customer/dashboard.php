<?php
    session_start();
    if(!isset($_SESSION['id'])){
		header("location: ../auth/login.php");
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
<style>
    body{
        background-color: white;
    }
</style>
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
	<!-- header -->
	<div class="header">
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-right">
            <ul> 
                <?php if(isset($_SESSION['id'])){ ?>
                    <li class="dropdown head-dpdn">
                        <form action="../auth/signout.php" method="post">
                            <button class="dropdown-toggle" style="background-color: Transparent;background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none; color:white">Sign Out</button>
                        </form>
                    </li>
                <?php } else { ?>
                    <li class="dropdown head-dpdn">
                        <a href="../auth/login.php" class="dropdown-toggle">Login</a>
                    </li>
                    <li class="dropdown head-dpdn">
                        <a href="../auth/signup.php" class="dropdown-toggle">Sign Up</a>
                    </li>
                <?php }; ?>
            </ul>
			</div>
			<div class="clearfix"> </div> 
		</div>
	</div>
	<!-- //header --> 
    <?php
        include '../connect.php';
    ?>
    <div class="container" style="padding-top:50px">
        <center><a href="../"><img src="../images/logo.png" width="150px"></a><center><br><br>
        <div class="jumbotron">
        <?php 
            $sql_cust = "SELECT * FROM customer WHERE CustomerID = ".$_SESSION['id'].";";
            // echo $sql_cust;
            $result_cust = $conn->query($sql_cust);
            $row_cust = $result_cust->fetch_assoc();
        ?>
            <h1 class="display-4"><center>Hello, <?php echo $row_cust['CustomerName'] ?></center></h1>
            <br><br>
            <div class="container">
            <div class="row">
            <div class="col-lg-4 col-md-4">
                <center><img src="<?php echo $row_cust['Picture']?>" width="200px"></center>
            </div>
            <div class="col-lg-8 col-md-8">
                <span class="cust-details"><b>Address:</b> <?php echo $row_cust['Address']?></span><br>
                <span class="cust-details"><b>Phone No:</b> <?php echo $row_cust['Phone']?></span><br>
                <span class="cust-details"><b>Email:</b> <?php echo $row_cust['Email']?></span><br>
            </div>
            </div>
            </div>
        </div>
    </div>
    <div class="container" style="padding-top:50px">
    <?php
    $sql = "SELECT history.SellerID as sid, history.TransactionID as transid, history.quantity as quantity , product.ProductID as prodid ,product.PName as name, history.Quantity as quantity, history.Purchase_Price as mrp, product.Picture as pic 
    FROM product
    INNER JOIN history ON product.ProductID=history.ProductID and history.CustomerID=".$_SESSION['id'].";"; 
    // echo $sql;
    $re_result = $conn->query($sql);
    if($row = $re_result->fetch_assoc() == ""){ ?>
        <div class="jumbotron">
            <div class="container">
            <h3 class="display-4">You have bought nothing yet</h3><br>
            <p class="lead"><a href="../">Continue Shopping</a></p>
            </div>
        </div>
    <?php }
    else {
        $re_result = $conn->query($sql);
    ?>
        <h1 style="color:white"><center><b>Booking History</b></center></h1><br><br>
    <?php
        while($row = $re_result->fetch_assoc()){
    ?> 	
        <div class="jumbotron">
            <div class="container">
            <div class="row">
            <div class="col-lg-4 col-md-4"><img src="<?php echo $row['pic'] ?>" alt="<?php echo $row['PName'] ?>" width="80%"></div>
            <div class="col-lg-4 col-md-8">
            <a href="<?php echo "../single.php?id=".$row['prodid'] ?>"><h2><?php echo $row['name'] ?></h2></a></br>
            <span>Price: &#x24;<?php echo intval(($row["mrp"])*100)/100 ?></span></br>
            <span>Quantity: <?php echo $row['quantity'] ?></span>
            <br><br>
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#<?php echo 'target'.$row['prodid'] ?>">Give Feedback</button>
            <div id="<?php echo 'target'.$row['prodid'] ?>" class="collapse">
                <br><br>
                <form action="<?php echo 'feedback.php' ?>" method="post">
                    <input type="hidden" name="prodid" value="<?php echo $row['prodid'] ?>">
                    <div class="form-group">
                    <label for="value">Rating</label>
                    <input type="number" id="value" name="value" min="1" max="10" value="1">
                    </div>
                    <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
                    </div> 
                    <input type="submit" value="Submit">
                </form>
            </div>
            <br><br>
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#<?php echo 'target_sel'.$row['sid'] ?>">Give Seller Rating</button>
            <div id="<?php echo 'target_sel'.$row['sid'] ?>" class="collapse">
                <br><br>
                <form action="<?php echo 'sel_feed.php' ?>" method="post">
                    <input type="hidden" name="prodid" value="<?php echo $row['prodid'] ?>">
                    <input type="hidden" name="sid" value="<?php echo $row['sid'] ?>">
                    <input type="hidden" name="transid" value="<?php echo $row['transid'] ?>">
                    <h4>Rating</h4>
                    <div class="form-group">
                    <label for="ship">Shipping</label>
                    <input type="number" id="ship" name="ship" min="1" max="10" value="1" required>
                    </div>
                    <div class="form-group">
                    <label for="pack">Packaging</label>
                    <input type="number" id="pack" name="pack" min="1" max="10" value="1" required>
                    </div>
                    <div class="form-group">
                    <label for="qual">Quality</label>
                    <input type="number" id="qual" name="qual" min="1" max="10" value="1" required>
                    </div>
                    <div class="form-group">
                    <label for="cc">Customer_Care</label>
                    <input type="number" id="cc" name="cc" min="1" max="10" value="1" required>
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>
            <br><br>
            <div>
                <form action="../payment/invoice2.php" method="POST">
                    <input type="hidden" name="transid" value="<?php echo $row['transid'] ?>"/>
                    <input type="submit" class="btn btn-info" value="Get Invoice">
                </form>
            </div>
            </div>
            </div>
            </div>
        </div>
    <?php
        }
    }
    ?>
    </div>
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