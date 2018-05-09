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
    
     $user = unserialize($_SESSION["user"]);
    
    if(isset($_GET["rego"]) && isset($_SESSION["user"]))
    {
        $keywords = $_POST["rego"];
        $car = new Car;
        $car->LoadCar($db, $rego, $user->email);
        echo $cars->ToJSON();
    }
    else
    {
        echo "";
    }

?>