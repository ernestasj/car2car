<?php
    include("../php/includes.php");
    include("../php/loggedin.php");
    if(isset($_POST["keywords"]))
    {
        $keywords = $_POST["keywords"];
        $cars = new Cars;
        $cars->LoadCars($db, $keywords);
        $_SESSION['cars'] = serialize($cars);
        echo $cars->ToJSON();
    
    }
    else
    {
        echo "";
    }
    
?>