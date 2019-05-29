<?php
    include "../connect_no_red.php";
    session_start();
    if(isset($_SESSION['id'])){
		if(isset($_SESSION['count2'])){
			if($_SESSION['count2'] != 0){
                $autocommit = "SET autocommit = 0;";
                $autocommiton = "SET autocommit = 1;";
                $conn->query("START TRANSACTION;");
                $conn->query($autocommit);
                $sql = "CALL delete_sel_acc(5)";
                if($conn->query($sql)){
                    $conn->query("COMMIT;");
                    $conn->query($autocommiton);
                    unset($_SESSION['cmpid']);
                    header("location: .");
                }else{
                    $conn->query("ROLLBACK;");
                    $conn->query($autocommiton);
                    header("location: err_del_acc.php");
                }
			}
		}
	}else{
        header("location: login.php");
    }
?>