<?php
    $user;

    if(!isset($_SESSION['user']))
    {
        $error = ["error" => "logged out"];
        echo json_encode($error);
        exit ();
    }
    else
    {
        $user = unserialize($_SESSION['user']);
    }
?>