<?php
    session_start();
    include "connect.php";
?>
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
	<!-- header -->
    <div class="container" style="margin-top: 40px; margin-bottom: 40px">
    <h3>Search Result for <b><?php echo $_GET['search'] ?></b></h3>
    </div>
    <div class="container">
    <?php 
        $search_word = preg_split("/\s+/", $_GET['search']);
        $query = "SELECT * FROM ".$product_table." WHERE UPPER(PName) LIKE UPPER('%".$search_word[0]."%')";
        for($i = 1; $i < count($search_word); $i++) {
            $query .= " OR UPPER(PName) LIKE UPPER('%".$search_word[$i]."%')";
        }
        // echo $query;
        $result = $conn->query($query);
        $result2 = $conn->query($query);
    ?>
        <div class="products-row">
        <?php 
            while($row = $result->fetch_assoc()){
        ?>
        <div class="jumbotron">
            <div class="container">
            <div class="row">
            <div class="col-lg-4 col-md-4"><a href="<?php echo 'single.php?id='.$row['ProductID'] ?>"><img src="<?php echo "images/".$row['Picture'] ?>" class="img-responsive" alt="img"></a></div>
            <div class="col-lg-4 col-md-8">
            <a href="<?php echo "single.php?id=".$row['ProductID'] ?>"><h2><?php echo $row["PName"] ?></h2></a></br>
            <span><h4><del>&#x24;<?php echo intval($row["Cost"]*100)/100 ?></del> &#x24;<?php echo intval(($row["Cost"]- ($row["Cost"]*$row["Discount"])/100)*100)/100 ?></h4> </span></br>
            </div>
            </div>
            </div>
        </div>
        <?php
        };
        $row = $result->fetch_assoc();
        if($row == ""){
           echo "<h1>No search result is found for the given key word.</h1>";
           echo "Return to <a href='.'>Home</a> Page";
        } 
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