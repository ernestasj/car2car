<?php
    include("../php/includes.php");
    //include("../php/loggedin.php");
    $cars = new Cars;
    $user = unserialize($_SESSION["user"]);
    echo $user->ToJSON();
?>