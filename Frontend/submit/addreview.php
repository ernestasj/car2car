<?php
    include ("../php/includes.php");
    include ("../php/loggedin.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $user = unserialize($_SESSION['user']);
        $cars = unserialize($_SESSION['cars']);
        $carid = mysqli_real_escape_string($db,$_POST['carid']);
        $comments = mysqli_real_escape_string($db,$_POST['comments']);
        $rating = mysqli_real_escape_string($db,$_POST['rating']);
        $cars->AddReview($db, $user->email, $carid, $rating, $comments);
    }

?>