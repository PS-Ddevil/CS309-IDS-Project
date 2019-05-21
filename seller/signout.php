<?php
    session_start();
    if(!isset($_SESSION['cmpid'])){
		header("location: .");
	}else{
        unset($_SESSION['cmpid']);
        header("location: .");
    }
?>