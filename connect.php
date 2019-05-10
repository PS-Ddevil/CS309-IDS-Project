<?php
error_reporting(0);
session_start();
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
//    echo "Some Error";
}
?>