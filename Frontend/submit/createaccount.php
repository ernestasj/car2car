<?php
   include ("../php/includes.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = new User($_POST);
        $user->WriteDB($db);
        $_SESSION['user'] = serialize($user);
        header("location: ../index2.html");

   }

?>