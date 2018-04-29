<?php
    $petrol = [["value" => "1", "text" => "1"]];
    array_push($petrol, ["value" => "2", "text" => "2"]);
    array_push($petrol, ["value" => "3", "text" => "3"]);
    array_push($petrol, ["value" => "4", "text" => "4"]);
    array_push($petrol, ["value" => "5", "text" => "5"]);
    array_push($petrol, ["value" => "6", "text" => "6+"]);
    echo json_encode($petrol);
?>