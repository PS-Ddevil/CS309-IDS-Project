<?php
session_start();
include "connect.php";
if(!isset($_SESSION['cmpid'])){
    header("location: login.php");
}

$PName = addslashes($_POST["PName"]);
$cat_id = addslashes($_POST["CategoryID"]);
$sub_cat = addslashes($_POST["Sub_Cat"]);
$disc = addslashes($_POST["Discount"]);
$cost = addslashes($_POST["Cost"]);
$quan = addslashes($_POST["Quan"]);
$sm_desp = addslashes($_POST["sm_Description"]);
$lg_desp = addslashes($_POST["lg_Description"]);

$sql_getquan = "SELECT MAX(ProductID) as max FROM product;";
$exe = $conn->query($sql_getquan);
$row_quan = $exe->fetch_assoc();
$proid = $row_quan['max'] + 1;
$autocommit = "SET autocommit = 0;";
$autocommiton = "SET autocommit = 1;";
$conn->query($autocommit);
$conn->query("START TRANSACTION;");

// echo $_cat_id;

$bytes = random_bytes(16);
$random_name = bin2hex($bytes);
echo $random_name;
$ext = end(explode('.', $_FILES["image"]["name"]));
$name = $random_name.'.'.$ext;
$upload_dir = "../images/".$cat_id."/".$sub_cat."/".$name;

if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir)) {
 echo "File is valid, and was successfully uploaded.";
} else {
   echo "Upload failed";
}

$sql = "INSERT INTO product(ProductID, PName, CategoryID, Sub_Cat, Picture, sm_Desp, Cost, lg_Desp) VALUES(".$proid.", '".$PName."',".$cat_id.",".$sub_cat.",'".$upload_dir."','".$sm_desp."',".$cost.",'".$lg_desp."')";
$sql_seller = "INSERT INTO seller_prod(SellerID, ProductID, Quantity, Discount) VALUES(".$_SESSION['cmpid'].",".$proid.",".$quan.",".$disc.");";
if($conn->query($sql)){
    echo $sql;
    if($conn->query($sql_seller)){
        // echo $sql_seller;
        $conn->query("COMMIT;");
        $conn->query($autocommiton);
        header("Location: .");
    }
    else{
        echo "galat";
        $conn->query("ROLLBACK;");
        $conn->query($autocommiton);
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
    
}else{
    $conn->query("ROLLBACK;");
    $conn->query($autocommiton);
    echo "Error: ".$sql."<br>".mysqli_error($conn);
}

?>