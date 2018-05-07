<?php
    include ("../php/includes.php");
    include ("../php/loggedin.php");

    $user = unserialize($_SESSION['user']);
    $cars = unserialize($_SESSION['cars']);
    $carid = $_POST['carid'];
    $date = $_POST['date'];
    $rego = $cars->GetRego($carid);
    $booking = new Booking($rego, $user->email, $date);
    $booking->WriteDB($db);

?>