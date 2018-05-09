<?php
   include ("../php/includes.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = unserialize($_SESSION["user"]);
        $user->UpdateUser($_POST);
        //$user = new User($_POST);
        //$user->WriteDB($db);
        $user->WriteUpdateDB($db);
        $_SESSION['user'] = serialize($user);
        header("location: ../index2.html");

   }

?>