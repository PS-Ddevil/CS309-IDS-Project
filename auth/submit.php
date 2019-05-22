<?php
include "../connect.php";
$custname =  addslashes($_POST["name"]);
$email =  addslashes($_POST["email"]);
$address =  addslashes($_POST["address"]);
$billadd =  addslashes($_POST["billadd"]);
$phno =  addslashes($_POST["phno"]);
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$pic_id = rand(10000000, 999999999);
$ext = end(explode('.', $_FILES["image"]["name"]));
$name = $pic_id.'.'.$ext;
$upload_dir = "../images/customers/".$name;
// echo $upload_dir;
if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir)) {
 echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed";
}

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}

$sql = "INSERT INTO customer(CustomerName, Address, Phone, Email, Picture, BillingAddress, Password) VALUES('".$custname."','".$address."',".$phno.",'".$email."','".$upload_dir."','".$billadd."' ,'".$pass."')";

// echo $sql;

if(mysqli_query($conn, $sql)){
    header("Location: login.php");
}else{
    header("Location: err_signup.php");
}

mysqli_close($conn);
?>