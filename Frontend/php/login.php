<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      // Do a count instead of return table?
      // Figure out how to do proper request to sql server to avoid security risk below
      //$sql = "SELECT COUNT(*) FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $stmt = $db->stmt_init();
      $stmt = $db->prepare("SELECT * FROM user WHERE username = ? and password = ?");
      
      $stmt->bind_param("ss", $myusername, $mypassword);
      $stmt->execute();
      $count = 0;
      $result = $stmt->get_result();

      
      $count = mysqli_num_rows($result);
      echo $count;
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         $error = "";
         header("location: ../pages/index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>