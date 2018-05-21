<?php
    include ("../php/includes.php");
    include ("../php/loggedin.php");
   


   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $user = unserialize($_SESSION['user']);
      $email = $user->GetEmail();
      $car = new Car($_POST);
      $car->WriteDB($db, $email);
      $filename = UploadPhoto("photo");
      $car->AddPhoto($db, $filename);
   }

   header("Location: ../index.html");
   die();
?>