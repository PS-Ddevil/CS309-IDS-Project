<?php
include "../connect.php";
session_start();
$prodid =  addslashes($_POST["prodid"]);
$sid =  addslashes($_POST["sid"]);
$pack =  addslashes($_POST["pack"]);
$ship =  addslashes($_POST["ship"]);
$qual =  addslashes($_POST["qual"]);
$cc =  addslashes($_POST["cc"]);
$transid =  addslashes($_POST["transid"]);

$autocommit = "SET autocommit = 0;";
$autocommiton = "SET autocommit = 1;";
$conn->query($autocommit);
$conn->query("START TRANSACTION;");

if(!$conn){
    die("Connection failed:". mysqli_connect_error());
}

$sql_check = "SELECT COUNT(*) as count FROM `seller_rating` WHERE ProductID = ".$prodid." AND TransID = ".$transid." AND CustomerID = ".$_SESSION['id']." AND SellerID = ".$sid.";";
$sql_up = "UPDATE seller_rating SET TransID =".$transid." ,Shipping = ".$ship. ", Packaging = ".$pack.", Quality = ".$qual.",  Customer_Care = ".$cc." WHERE ProductID = ".$prodid." AND TransID = ".$transid." AND CustomerID = ".$_SESSION['id']." AND SellerID = ".$sid."; ";
$sql_insert = "INSERT INTO seller_rating(TransID, SellerID, ProductID, CustomerID, Shipping, Packaging, Quality, Customer_Care) VALUES(".$transid.",".$sid.",".$prodid.",".$_SESSION['id'].",".$ship.",".$pack.",".$qual.",".$cc.")";

if($conn->query($sql_check)){
    $res = $conn->query($sql_check);
    $row = $res->fetch_assoc();
    if($row['count'] != 0){
        if($conn->query($sql_up)){
            $conn->query("COMMIT;");
            $conn->query($autocommiton);
            header("Location: thankyou.php");
        }else{
            $conn->query("ROLLBACK;");
            $conn->query($autocommiton);
            header("Location: err.php");
        }
    }else{
        if($conn->query($sql_insert)){
            $conn->query("COMMIT;");
            $conn->query($autocommiton);
            header("Location: thankyou.php");
        }else{
            $conn->query("ROLLBACK;");
            $conn->query($autocommiton);
            header("Location: err.php");
        }
    }
}else{
    header("Location: err.php");
}

mysqli_close($conn);
?>