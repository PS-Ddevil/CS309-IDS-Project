<?php
session_start();
include "connect.php";
if(!isset($_SESSION['cmpid'])){
    header("location: login.php");
}

$disc = addslashes($_POST["Discount"]);
$quan = addslashes($_POST["Quantity"]);
$pid = addslashes($_POST["prodid"]);

$autocommit = "SET autocommit = 0;";
$autocommiton = "SET autocommit = 1;";
$conn->query($autocommit);
$conn->query("START TRANSACTION;");

$sql = "INSERT INTO seller_prod(SellerID, ProductID, Quantity, Discount) VALUES(".$_SESSION['cmpid'].",".$pid.",".$quan.",".$disc.");";
$sql_exist = "SELECT Count(*) as count FROM seller_prod WHERE SellerID = ".$_SESSION['cmpid']." AND ProductID = ".$pid.";";
$sql_modify = "UPDATE seller_prod SET Quantity = ".$quan." , Discount = ".$disc." WHERE SellerID = ".$_SESSION['cmpid']." AND ProductID = ".$pid.";";

$res_exist = $conn->query($sql_exist);
$row_exist = $res_exist->fetch_assoc();

if($row_exist['count'] == 0){
    if($conn->query($sql)){
        // echo "here1";
        $conn->query("COMMIT;");
        $conn->query($autocommiton);
        header("location: add_other.php");
    }else{
        // echo "here2";
        $conn->query("ROLLBACK;");
        $conn->query($autocommiton);
        header("location: err_add.php");
    }
}else{
    if($conn->query($sql_modify)){
        // echo "here3";
        $conn->query("COMMIT;");
        echo $sql_modify;
        $conn->query($autocommiton);
        header("location: add_other.php");
    }else{
        // echo "here4";
        $conn->query("ROLLBACK;");
        $conn->query($autocommiton);
        header("location: err_add.php");
    }

}
?>