<?php
   
   $email = "Email address";
   $password = "Password";
   $first_name = "First name";
   $last_name = "Last name";
   $licence = "Licence number";
   $cardtype = "";
   $ccnumber = "Card number";
   $expiry = "mm/yy";
   $cvc = "cvc";
   $cardname = "Name on card";
   $photo = "";


   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // This needs to be bundled into an account class
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['password']);
        $first_name = mysqli_real_escape_string($db,$_POST['firstname']);
        $last_name = mysqli_real_escape_string($db,$_POST['lastname']);
        $licence = mysqli_real_escape_string($db,$_POST['licence']);
        $cardtype = mysqli_real_escape_string($db,$_POST['cardtype']);
        $ccnumber = mysqli_real_escape_string($db,$_POST['ccnumber']);
        $expiry = mysqli_real_escape_string($db,$_POST['expiry']);
        $cvc = mysqli_real_escape_string($db,$_POST['cvc']);
        $cardname = mysqli_real_escape_string($db,$_POST['cardname']);
        $photoname = $_FILES['photo']['name'];
        $uploadfile = './' . basename($_FILES['photo']['name']);
        $success = move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);

        $user = new User($email, $password, $first_name, $last_name, $licence, $cardtype, $ccnumber, $expiry, $cvc, $cardname, $photoname);
        $user->WriteDB($db);
        //$stmt = $db->prepare("call CreateAccount(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        //$stmt->bind_param("sssssssssss", $email, $password, $first_name, $last_name, $licence, $cardtype, $ccnumber, $expiry, $cvc, $cardname, $photoname);
        //$stmt->execute();

        //$_SESSION['login_user'] = $email;
        //$_SESSION['login_password'] = $password;
        //header("location: ../pages/index.php");
   }

?>