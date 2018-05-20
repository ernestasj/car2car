<?php
    include("../php/includes.php");

    
    $none = [];
    $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $bookingid = $request->bookingid;
    $user = unserialize($_SESSION['user']);
    $email = $user->GetEmail();
    $booking = new Booking();
    $booking->WriteDecline($db, $email, $bookingid);

?>