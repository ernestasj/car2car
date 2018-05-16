<?php
    ini_set('max_execution_time', 3000);
    include("../php/includes.php");
    $string = file_get_contents("../json/suburbs.json");
    $suburbs = json_decode($string, true);
    foreach($suburbs as $suburb)
    {
        $name = $suburb["locality"];
        $postcode =  $suburb["postcode"];
        $state = $suburb["state"];
        $long = $suburb["long"];
        $lat = $suburb["lat"];

        //echo $name . "|" . $postcode  . "|" . $state  . "|" . $long  . "|" . $lat;

        $stmt = $db->prepare("call AddSuburb(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $postcode, $state, $long, $lat);
        $stmt->execute();
        $stmt->close();

    }
?>