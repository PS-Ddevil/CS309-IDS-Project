<?php
    session_start();
    if(!isset($_SESSION['id'])){
		header("location: ../");
	}else{
        unset($_SESSION['id']);
        header("location: ../");
    }
?>