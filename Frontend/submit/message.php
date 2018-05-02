<?php
    include ("../php/includes.php");
    include ("../php/loggedin.php");
    $user = unserialize($_SESSION['user']);
    $bookingid = $_POST['bookingid'];
    $email = $user->email;
    $text = $_POST['message'];
    $message = new Message($email, $text, $bookingid);
    $message->WriteDB($db);
?>