<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_ids";
$product_table = "product";
$product_cat = "category";
$product_sub_cat = "sub_category";
$rating_tbl = "rating";
$cart = "cart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    //Done
}

if(isset($_SESSION['cmpid'])){
    $sql_check = "SELECT COUNT(*) as count FROM seller WHERE SellerID = ".$_SESSION['cmpid'].";";
    $res_check = $conn->query($sql_check);
    $row_check = $res_check->fetch_assoc();
    $_SESSION['count2'] = $row_check["count"];
}

if(isset($_SESSION['id'])){
    $sql_check = "SELECT COUNT(*) as count FROM customer WHERE CustomerID = ".$_SESSION['id'].";";
    $res_check = $conn->query($sql_check);
    $row_check = $res_check->fetch_assoc(); 
    $_SESSION['count1'] = $row_check["count"];
}

?>