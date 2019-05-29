<?php
    include "../../connect.php";
    session_start();
    $productid = $_POST['prodid'];
    $custid = $_SESSION['id'];
    $conn->query($autocommit);
    
    $sql = "CALL revfrmcart(".$productid.",".$custid.")";
    echo $sql;

    if($conn->query($sql)){
        header("Location: .");
    }else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
?>