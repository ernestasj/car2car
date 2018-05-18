<?php
    include("../php/includes.php");

    
    $none = [];
    $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $rego = $request->rego;
    $date = $request->date;
    $user = unserialize($_SESSION['user']);
    $email = $user->GetEmail();
    $booking = new Booking($rego, $email, $date);
    $booking->WriteDB($db);

?>