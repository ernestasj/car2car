<?php
    include("../php/includes.php");
    // This needs to be a database call as well. GetModels(make)
    /*
    $models = [];
    $ford = [["value" => "Falcon", "name" => "Falcon"]];
    array_push($ford, ["value" => "Ranger", "name" => "Ranger"]);
    $models["Ford"] = $ford;
    
    $holden = [["value" => "Commodore", "name" => "Commodore"]];
    $models["Holden"] = $holden;

    $toyota = [["value" => "86", "name" => "86"]];
    array_push($toyota, ["value" => "Prius", "name" => "Prius"]);
    $models["Toyota"] = $toyota;

    $nissan = [["value" => "GT-R", "name" => "GT-R"]];
    array_push($nissan, ["value" => "Pathfinder", "name" => "Pathfinder"]);
    $models["Nissan"] = $nissan;

    $subaru = [["value" => "Impreza", "name" => "Impreza"]];
    array_push($subaru, ["value" => "WRX", "name" => "WRX"]);
    $models["Subaru"] = $subaru;

    $mitsubishi = [["value" => "Lancer", "name" => "Lancer"]];
    $models["Mitsubishi"] = $mitsubishi;
*/
    $none = [];
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $make = $request->make;

    if(isset($make)) {

        $stmt = $db->stmt_init();
        $stmt = $db->prepare("call GetModels(?)");
        $stmt->bind_param("s", $make);
        $stmt->execute();
        $result = $stmt->get_result();

        $models = [];
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                array_push($models, $row);
            }
        }
    
        echo json_encode($models);

    }
    else
    {
        echo json_encode($none);
    }
?>