<?php
    include ("../php/includes.php");


   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $user = unserialize($_SESSION['user']);
      $email = $user->GetEmail();
      $car = new Car($_POST);
      $car->UpdateDB($db, $email);
      $filename = UploadPhoto("photo");
      $car->AddPhoto($db, $filename);
   }

   header("Location: ../index.html");
   die();
?>