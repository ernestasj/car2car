<?php
    
    include("../php/includes.php");
    //include("../php/loggedin.php");
    $user = unserialize($_SESSION['user']);
    $bookings = new Bookings;
    $bookings->LoadBookings($db, $user->GetEmail());//$user->desc["email"]);
    echo $bookings->ToJSON();

?>