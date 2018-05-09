<?php
    include("../php/includes.php");
    //include("../php/loggedin.php");
    $postdata = file_get_contents("php://input");

   
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