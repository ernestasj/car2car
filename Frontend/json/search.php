<?php
    include("../php/includes.php");
    //include("../php/loggedin.php");
    $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $keywords = $request->keywords;
    $cars = new Cars;
    $cars->LoadCars($db, $keywords);
    echo $cars->ToJSON();
    $_SESSION['cars'] = serialize($cars);
    
    /*
    if(isset($_POST["keywords"]))
    {
        $keywords = $_POST["keywords"];
        $cars = new Cars;
        $cars->LoadCars($db, $keywords);
        echo $cars->ToJSON();
        $_SESSION['cars'] = serialize($cars);
        
    
    }
    else
    {
        echo "";
    }
    */
?>