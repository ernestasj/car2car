<?php
    include("../php/includes.php");
    session_destroy();
    // Redirect url here or something.
    header("Location: ../loggedout.html");
    die();
 
?>