<?php
    include("../php/includes.php");

    $cars = new Cars;
    $cars->LoadCars($db, "words");

    echo $cars->ToJSON();
?>