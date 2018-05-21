<?php
   include ("../php/includes.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
        $filename = UploadPhoto("photo");
        $user = new User($_POST);
        $user->WriteDB($db);
        $user->AddPhoto($db, $filename);
        $_SESSION['user'] = serialize($user);
        header("location: ../index.html");

   }

?>