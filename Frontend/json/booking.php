<?php
    
    include("../php/includes.php");
    //include("../php/loggedin.php");
    $user = unserialize($_SESSION['user']);
    $bookings = new Bookings;
    $bookings->LoadBookings($db, "bob");//$user->desc["email"]);
    echo $bookings->ToJSON();

?>