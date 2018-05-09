<?php
    include ("../php/includes.php");
    include ("../php/loggedin.php");
   


   if($_SERVER["REQUEST_METHOD"] == "POST") {
     $user = unserialize($_SESSION['user']);
     $email = $user->GetEmail();
      // This needs to be bundled into a car class
        //$photoname = $_FILES['photo']['name'];
        //$uploadfile = '../img/' . basename($_FILES['photo']['name']);
        //$success = move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
        $car = new Car($_POST);
        $car->WriteDB($db, $email);

   //     echo '{"success": "success"}';
        //$_SESSION['login_user'] = $email;
        //$_SESSION['login_password'] = $password;
        //header("location: ../pages/index.php");
   }

   header("Location: ../index2.html");
   die();
?>