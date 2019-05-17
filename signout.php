<?php
    session_start();
    if(!isset($_SESSION['id'])){
		header("location: .");
	}else{
        session_destroy(); 
        header("location: .");
    }
?>