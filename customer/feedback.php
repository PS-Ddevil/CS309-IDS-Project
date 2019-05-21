<?php
include "../connect.php";
session_start();
$prodid =  addslashes($_POST["prodid"]);
$value =  addslashes($_POST["value"]);
$comment =  addslashes($_POST["comment"]);
$ratid = rand(10000000, 999999999);

if(!$conn){
    die("Connection failed:". mysqli_connect_error());
}

$sql = "INSERT INTO rating(UserID, ProductID, Value, Comment, RatingID) VALUES(".$_SESSION['id'].",".$prodid.",".$value.",'".$comment."',".$ratid.")";

// echo $sql;

if(mysqli_query($conn, $sql)){
    header("Location: thankyou.php");
}else{
    // echo $sql;
    header("Location: err_feedback.php");
}

mysqli_close($conn);
?>