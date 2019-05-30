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

$autocommit = "SET autocommit = 0;";
$autocommiton = "SET autocommit = 1;";
$conn->query($autocommit);
$conn->query("START TRANSACTION;");

$sql_check = "SELECT COUNT(*) as count FROM `rating` WHERE ProductID = ".$prodid." AND UserID = ".$_SESSION['id'].";";
$sql_up = "UPDATE rating SET Value = ".$value.", Comment = '".$comment."', RatingID = ".$ratid." WHERE ProductID = ".$prodid." AND UserID = ".$_SESSION['id']."; ";
$sql_insert = "INSERT INTO rating(UserID, ProductID, Value, Comment, RatingID) VALUES(".$_SESSION['id'].",".$prodid.",".$value.",'".$comment."',".$ratid.")";

echo $sql;
if($conn->query($sql_check)){
    $res = $conn->query($sql_check);
    $row = $res->fetch_assoc();
    if($row['count'] != 0){
        if($conn->query($sql_up)){
            $conn->query("COMMIT;");
            $conn->query($autocommiton);
            header("Location: thankyou.php");
        }else{
            echo $sql_up;
            $conn->query("ROLLBACK;");
            $conn->query($autocommiton);
            // header("Location: err_feedback.php");
        }
    }else{
        if($conn->query($sql_insert)){
            $conn->query("COMMIT;");
            $conn->query($autocommiton);
            header("Location: thankyou.php");
        }else{
            $conn->query("ROLLBACK;");
            $conn->query($autocommiton);
            header("Location: err_feedback.php");
        }
    }
}else{
    header("Location: err.php");
}

mysqli_close($conn);
?>