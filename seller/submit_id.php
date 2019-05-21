<?php
include "../connect.php";
$name =  addslashes($_POST["cmpnyname"]);
$email =  addslashes($_POST["email"]);
$phno =  addslashes($_POST["phno"]);
$usrname =  addslashes($_POST["username"]);
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}

$sql = "INSERT INTO seller(CompanyName, Username, Phone, Email, Password) VALUES('".$name."','".$usrname."',".$phno.",'".$email."','".$pass."')";

// echo $sql;

if(mysqli_query($conn, $sql)){
    header("Location: login.php");
}else{
    header("Location: err_signup.php");
}

mysqli_close($conn);
?>