<?php
    $trips = [["date"=> "12/12/2017", "owner"=>"Rob", "rego" => "CGH-ARG", "cost" => "45"]];
    array_push($trips, ["date"=> "3/12/2017", "owner"=>"Harry", "rego" => "LMO-123", "cost" => "78"]);
    echo json_encode($trips);
?>