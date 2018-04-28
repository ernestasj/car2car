<?php
   session_start();

   $_SESSION['login_user'] = 'bob';
   
   $rego = "rego";
   $manufacturer = "manufacturer";
   $make = "make";
   $model = "model";
   $year = "year";
   $doors = "";
   $petrol = "";
   $transmission = "";
   $enginecc = "enginecc";
   $kms = "kms";
   $body = "";
   $photo = "";


   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // This needs to be bundled into a car class
        $email = $_SESSION['login_user'];
        $rego = mysqli_real_escape_string($db,$_POST['rego']);
        $manufacturer = mysqli_real_escape_string($db,$_POST['manufacturer']);
        $make = mysqli_real_escape_string($db,$_POST['make']);
        $model = mysqli_real_escape_string($db,$_POST['model']);
        $year = mysqli_real_escape_string($db,$_POST['year']);
        $doors = mysqli_real_escape_string($db,$_POST['doors']);
        $petrol = mysqli_real_escape_string($db,$_POST['petrol']);
        $transmission = mysqli_real_escape_string($db,$_POST['transmission']);
        $enginecc = mysqli_real_escape_string($db,$_POST['enginecc']);
        $kms = mysqli_real_escape_string($db,$_POST['kms']);
        $body = mysqli_real_escape_string($db,$_POST['body']);
        $photoname = $_FILES['photo']['name'];
        //$uploadfile = './' . basename($_FILES['photo']['name']);
        //$success = move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);

        $car = new Car($rego, $manufacturer, $make, $model, $year, $doors, $petrol, $transmission, $enginecc, $kms, $body, $photoname);
        $car->WriteDB($db, $email);

        //$_SESSION['login_user'] = $email;
        //$_SESSION['login_password'] = $password;
        //header("location: ../pages/index.php");
   }

?>