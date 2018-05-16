<?php
    include("../php/includes.php");
    $user = new User($db, "a");
    $a = ["firstname" => "Robert!"];
    $user->UpdateUser($a);
    echo $user->desc["firstname"];
    $user->WriteUpdateDB($db);
?>