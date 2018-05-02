<?php
    
    include("../php/includes.php");
    include("../php/loggedin.php");
    $user = unserialize($_SESSION['user']);
    $bookings = new Bookings;
    $bookings->LoadBookings($db, $user->email);
    echo $bookings->ToJSON();

?>