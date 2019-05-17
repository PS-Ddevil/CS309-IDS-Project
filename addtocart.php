<?php
    include "connect.php";
    session_start();
    if(!isset($_SESSION['id'])){
		header("location: login.php");
	}
    $productid = $_GET['prodid'];
    $custid = $_SESSION['id'];
    $quantity = $_POST['quantity'];

    $sql_search = "SELECT Count(*) as count FROM cart WHERE productid = ".$productid." AND CustomerID = ".$custid.";";
    $re_result = $conn->query($sql_search);
    $row = $re_result->fetch_assoc();
    $count = $row['count'];

    $sql = "INSERT INTO `cart` (`CustomerID`, `ProductID`, `Quantity`) VALUES (".$custid." , ".$productid." , ".$quantity.");";
    $sql_change = "UPDATE `cart` SET `Quantity` = ".$quantity." WHERE `cart`.`CustomerID` = ".$custid." AND `cart`.`ProductID` = ".$productid.";";
    if($count == 0){
        if(mysqli_query($conn, $sql)){
            header("Location: cart.php");
        }else{
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }
    }
    if($count == 1){
        if(mysqli_query($conn, $sql_change)){
            header("Location: cart.php");
        }else{
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }
    }
    mysqli_close($conn);
?>