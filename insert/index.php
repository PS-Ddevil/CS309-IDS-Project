<html>
<head>
<link rel="icon" href="/img/Itzikgur-My-Seven-Books-2.ico" type="tmage/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<title>Sabka Dukan</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<style>
    #form{
        background-color: rgba(255,255,255,0.5);
    }
    .txt{
        float: left;
        margin-left: 40px;
        font-size: 20px;
    }
    .box{
        margin-bottom: 20px;
        margin-left: 40px;
        height: 30px;
        width: 90%;
    }
    #sum{
        height: 100px;
    }
</style>
</head>
<body style="background-image: url(img/pexels-photo-1290141.jpeg); background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover">
<div class="container">
<form action="" method="post" id="form" enctype="multipart/form-data">
    <center style="margin-top: 1%; padding-top: 20px; padding-bottom: 40px; font-size: 25px"><span>Book Fill-in Form</span></center>
    <span class="txt">Category</span>
    <select class="box" id="cat" name="genre" onchan/>
        <?php
            include "../connect.php";
            $sql = "SELECT * FROM ".$product_cat.";";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
        ?>
            <option value="<?php echo $row['CategoryID']?>"><?php echo $row['CategoryName']?></option>
        <?php 
            };
        ?>
    </select>
    <br>
    <center><input type="submit" value="Proceed"></input></center>
</form>
</div>
    <script>
        document
        .getElementById("form")
        .addEventListener("submit", function(e) {
            e.preventDefault();
            var cat_data = $('#cat').val();
            window.location.href="step2.php?cat="+cat_data;
        });
    </script>
</body>
</html>