<?php
    include("../php/includes.php");
    include("../php/loggedin.php");

    if(isset($_GET["carid"]))
    {
        $carid = $_GET["carid"];
        $cars = unserialize($_SESSION['cars']);
        echo $cars->CarToJSON($carid);
    }
    else
    {
        echo [];
    }
    
?>