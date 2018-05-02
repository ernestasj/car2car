<?php
    include("../php/includes.php");
    session_destroy();
    $error = ["error" => "logged out"];
    echo json_encode($error);
    exit ();

    // Redirect url here or something.
?>