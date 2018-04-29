<?php
    $petrol = [["value" => "E10", "text" => "E10"]];
    array_push($petrol, ["value" => "RON-91", "text" => "RON-91"]);
    array_push($petrol, ["value" => "RON-95", "text" => "RON-95"]);
    array_push($petrol, ["value" => "RON-98", "text" => "RON-98"]);
    array_push($petrol, ["value" => "Diesel", "text" => "Diesel"]);
    array_push($petrol, ["value" => "Electric", "text" => "Electric"]);
    echo json_encode($petrol);
?>