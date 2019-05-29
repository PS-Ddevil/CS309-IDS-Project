<?php
include "../connect.php";
session_start();
$id = $_SESSION['id'];
$autocommit = "SET autocommit = 0;";
$autocommiton = "SET autocommit = 1;";
$conn->query($autocommit);
$conn->query("START TRANSACTION;");
$sql = "SELECT cart.quantity as cart_quantity , product.ProductID as prodid, cart.quantity*product.Cost*(1 - seller_prod.Discount/100) as product_price, cart.sellerid as seller
FROM product
INNER JOIN cart ON product.ProductID=cart.ProductID and cart.CustomerID=".$_SESSION['id'].
" INNER JOIN seller_prod ON seller_prod.SellerID = cart.SellerID and cart.ProductID = seller_prod.ProductID
INNER JOIN seller ON cart.SellerID = seller.SellerID;";
$transid = rand(10000000, 999999999);
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $validate = "SELECT seller_prod.Quantity as quan_req, cart.quantity as quan_order 
        FROM cart
        LEFT JOIN seller_prod ON seller_prod.SellerID =  cart.SellerID AND seller_prod.ProductID = cart.ProductID;";
        $res_val = $conn->query($validate);
        $row_val = $res_val->fetch_assoc();
        $query = "INSERT INTO history (CustomerID, ProductID, SellerID, Quantity, Purchase_Price, TransactionID) VALUES (".$id.",".$row['prodid'].", ".$row['seller'].", ".$row['cart_quantity'].",".$row['product_price'].",".$transid.");";
        if($row_val['quan_req'] >= $row_val['quan_order']){
            $conn->query($query);
            $conn->query("COMMIT;");
            $conn->query($autocommiton);
            header('Location: thankyou.php');
        }else{
            $conn->query("ROLLBACK;");
            $conn->query($autocommiton);
            header('Location: error.php');
        }
    }
    $conn->query($autocommiton);
}else{
    $conn->query($autocommiton);
    header('Location: error.php');
}
?>