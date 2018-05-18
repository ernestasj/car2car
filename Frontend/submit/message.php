<?php
    include ("../php/includes.php");
    include ("../php/loggedin.php");
    $postdata = file_get_contents("php://input");
    $status = ["status" => "fail"];
    $request = json_decode($postdata);
    $bookingid = $request->bookingid;
    $text = $request->message;

    $user = unserialize($_SESSION['user']);
    //$bookingid = $_POST['bookingid'];
    $email = $user->GetEmail();
    //$text = $_POST['message'];
    $message = new Message($email, $text, $bookingid);
    $message->WriteDB($db);
?>