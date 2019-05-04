<?php include '../connect.php';?>
<?php
// echo "acme";
$PName = addslashes($_POST["PName"]);
$cat_id = addslashes($_POST["CategoryID"]);
$sub_cat = addslashes($_POST["Sub_Cat"]);
$disc = addslashes($_POST["Discount"]);
$cost = addslashes($_POST["Cost"]);
$sm_desp = addslashes($_POST["sm_Description"]);
$lg_desp = addslashes($_POST["lg_Description"]);

echo $_cat_id;

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

$sql = "INSERT INTO product(PName, CategoryID, Sub_Cat, Discount, Picture, Rating, sm_Desp, Cost, lg_Desp) VALUES('".$PName."',".$cat_id.",".$sub_cat.",".$disc.",'".$upload_dir."',0,'".$sm_desp."',".$cost.",'".$lg_desp."')";
if(mysqli_query($conn, $sql)){
    header("Location: index.php");
}else{
    echo "Error: ".$sql."<br>".mysqli_error($conn);
}

// echo readfile("submitted.html");
mysqli_close($conn);
?>