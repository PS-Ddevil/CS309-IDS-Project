<html>
<head>
<link rel="icon" href="/img/Itzikgur-My-Seven-Books-2.ico" type="tmage/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<title>Sabka Dukan</title>
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
    .box2{
        margin-bottom: 20px;
        margin-left: 40px;
        height: 30px;
        width: 20%;
    }
    #sum{
        height: 100px;
    }
</style>
</head>
<body style="background-image: url(img/pexels-photo-1290141.jpeg); background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover">
<div class="container">
    <form action="insert_pdt.php" method="post" id="form" enctype="multipart/form-data">
    <center style="margin-top: 1%; padding-top: 20px; padding-bottom: 40px; font-size: 25px"><span>Book Fill-in Form</span></center>
    <span class="txt">Product Name</span>
    <input class="box" id="PName" type="text" placeholder="Type Product Name" name="PName" required/>
    <br>
    <span class="txt">Discount</span>
    <input class="box" id="Discount" type="text" placeholder="Discount Percentage" name="Discount" required/>
    <br>
    <span class="txt">Cost</span>
    <input class="box" id="Cost" type="text" placeholder="Original Cost" name="Cost" required/>
    <br>
    <span class="txt">Small Description</span>
    <input class="box" id="sm_desp" type="text" placeholder="Small Description" name="sm_Description" required/>
    <br>
    <span class="txt">Details</span>
    <input class="box" id="lg_desp" type="text" placeholder="Details" name="lg_Description" required/>
    <br>
    <span class="txt">Image</span>
    <input class="box2" id="image" name="image" type="file" required/>
    <br>
    <span class="txt" style="display:none">CategoryID</span>
    <input class="box" id="CategoryID" name="CategoryID" type="text" style="display:none"/>
    <span class="txt">Sub-Category</span>
    <select class="box" id="Sub_Cat" name="Sub_Cat"/>
        <?php
            include "../connect.php";
            $cat_data = $_GET[cat];
            $sql = "SELECT * FROM ".$product_sub_cat." WHERE CategoryID= ".$cat_data.";";
            echo $sql;
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
        ?>
            <option value="<?php echo $row['Sub_Cat']?>"><?php echo $row['Sub_Name']?></option>
        <?php 
            };
        ?>
    </select>
    <br>
    <center><input type="submit"></center>
</form>
</div>
    <script>
        var x = "<?php echo $_GET[cat] ?>";
        document.getElementById("CategoryID").value = x;
    </script>
</body>
</html>