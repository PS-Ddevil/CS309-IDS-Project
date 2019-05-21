<?php
   include("../connect.php");
   if(isset($_SESSION['id'])){
		header("location: ../");
	}
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myemail = addslashes($_POST['email']);
      $mypassword = addslashes($_POST['password']); 
      
      $sql = "SELECT customerid, password FROM customer WHERE email = '".$myemail."';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $hash = $row['password'];
      $id = $row['customerid'];
      if (password_verify($mypassword, $hash)) {
            $count = 1;
        } else {
            $count = 0;
        }
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
         $_SESSION['id'] = $id;
         header("location: ../");
      }else {
         header("location: err_login.php");
      }
   }
?>