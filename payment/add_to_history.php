<?php
include "../connect.php";
session_start();
$id = $_SESSION['id'];
$sql = "SELECT cart.quantity as cart_quantity , product.ProductID as prodid , product.Cost*(1 - product.Discount/100) as product_price
FROM product
INNER JOIN cart ON product.ProductID=cart.ProductID and cart.CustomerID=".$_SESSION['id'].";";
$transid = rand(10000000, 999999999);
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $query = "INSERT INTO history (CustomerID, ProductID, Quantity, Purchase_Price, TransactionID) VALUES (".$id.",".$row['prodid'].", ".$row['cart_quantity'].",".$row['product_price'].",".$transid.");";
        $conn->query($query);
    }
}else{
    header('Location: error.php');
}
$sql_del = "DELETE FROM cart WHERE CustomerID = ".$id;
if($conn->query($sql_del)){
    header('Location: thankyou.php');
}else{
    $sql_get = "SELECT * FROM history WHERE TransactionID = ".$transid.";";
    $result_insert = $conn->query($sql_get);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $query = "INSERT INTO `cart` (`CustomerID`, `ProductID`, `Quantity`) VALUES (".$id.", ".$row['prodid'].", ".$row['product_quantity'].");"; 
            $conn->query($query);
        }
    }
    $sql_remove = "DELETE FROM history WHERE TransactionID = ".$transid.";";
    $conn->query($sql_del);
}
?>