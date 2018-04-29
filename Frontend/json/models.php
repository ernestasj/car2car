<?php
    $models = [];
    $ford = [["value" => "Falcon", "text" => "Falcon"]];
    array_push($ford, ["value" => "Ranger", "text" => "Ranger"]);
    $models["Ford"] = $ford;
    
    $holden = [["value" => "Commodore", "text" => "Commodore"]];
    $models["Holden"] = $holden;

    $toyota = [["value" => "86", "text" => "86"]];
    array_push($toyota, ["value" => "Prius", "text" => "Prius"]);
    $models["Toyota"] = $toyota;

    $nissan = [["value" => "GT-R", "text" => "GT-R"]];
    array_push($nissan, ["value" => "Pathfinder", "text" => "Pathfinder"]);
    $models["Nissan"] = $nissan;

    $subaru = [["value" => "Impreza", "text" => "Impreza"]];
    array_push($subaru, ["value" => "WRX", "text" => "WRX"]);
    $models["Subaru"] = $subaru;

    $mitsubishi = [["value" => "Lancer", "text" => "Lancer"]];
    $models["Mitsubishi"] = $mitsubishi;

    $none = [];
    
    if($_GET["make"]) {
        $make = $_GET["make"];
        if($models[$make])
        {
            echo json_encode($models[$make]);
        }
        else
        {
            echo json_encode($none);
        }
    }
    else
    {
        echo json_encode($none);
    }
?>