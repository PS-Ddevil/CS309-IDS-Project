<?php
    include "connect.php";
    session_start();
    $productid = $_GET['prodid'];
    $custid = $_SESSION['id'];

    $sql = "DELETE FROM cart WHERE ProductID = ".$productid." and CustomerID = ".$custid.";";
    
    if(mysqli_query($conn, $sql)){
        echo "<script> alert(".$sql.") </script>";
        header("Location: cart.php");
    }else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
    mysqli_close($conn);
?>