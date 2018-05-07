<?php
    include("../php/loggedin.php");
// Needs to be a database call. Something like GetCarBodyList()
    $body = [["value" => "Coupe", "text" => "Coupe"]];
    array_push($body, ["value" => "Hatch", "text" => "Hatch"]);
    array_push($body, ["value" => "Sedan", "text" => "Sedan"]);
    array_push($body, ["value" => "SUV", "text" => "SUV"]);
    array_push($body, ["value" => "Van", "text" => "Van"]);
    array_push($body, ["value" => "4x4", "text" => "4x4"]);    
    echo json_encode($body);
?>