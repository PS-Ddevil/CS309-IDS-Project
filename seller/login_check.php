<?php
   include("connect_no_red.php");
   session_start();
   if(isset($_SESSION['id'])){
		if(isset($_SESSION['count2'])){
			if($_SESSION['count2'] != 0){
				header("location: .");
			}
		}
	}
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = addslashes($_POST['username']);
      $mypassword = addslashes($_POST['pass']); 
      
      $sql = "SELECT sellerid, password FROM seller WHERE username = '".$username."';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $hash = $row['password'];
      $id = $row['sellerid'];
      if (password_verify($mypassword, $hash)) {
            $count = 1;
        } else {
            $count = 0;
        }
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
         $_SESSION['cmpid'] = $id;
         $_SESSION['seller'] = $username;
         unset($_SESSION['count2']);
         header("location: .");
      }else {
         // echo $sql." ".$hash." ".$mypassword;
         header("location: err_login.php");
      }
   }
?>