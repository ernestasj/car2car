<?php
    include ("../php/includes.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $_SESSION['login_user'] = 'bob';
        $user = $_SESSION['login_user'];
        $cars = $_SESSION['cars'];
        $carid = mysqli_real_escape_string($db,$_POST['carid']);
        $comments = mysqli_real_escape_string($db,$_POST['comments']);
        $rating = mysqli_real_escape_string($db,$_POST['rating']);
        $cars->AddReview($user, $carid, $rating, $comments);
    }

?>