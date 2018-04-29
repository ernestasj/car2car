<?php
    include("../php/includes.php");

    if(isset($_POST["keywords"]))
    {
        $keywords = $_POST["keywords"];
        $cars = new Cars;
        $cars->LoadCars($db, $keywords);
    
        echo $cars->ToJSON();
    
    }
    else
    {
        echo [];
    }
    
?>