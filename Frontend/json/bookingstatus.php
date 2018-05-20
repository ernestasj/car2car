<?php
    
    include("../php/includes.php");
    //include("../php/loggedin.php");
    $user = unserialize($_SESSION['user']);
    $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    
    

    if(property_exists($request, "bookingid")) {
        $bookingid = $request->bookingid;
        $booking = new Booking;
        $booking->LoadBookingStatus($db, $user->GetEmail(), $bookingid);
        echo json_encode($booking->AsArray());
    }
    else
    {
        echo json_encode([]);
    }

?>