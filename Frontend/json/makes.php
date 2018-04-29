<?php
// similar to body. needs to be a db call so admin can update.
    $makes = [["value" => "Ford", "text" => "Ford"]];
    array_push($makes, ["value" => "Holden", "text" => "Holden"]);
    array_push($makes, ["value" => "Nissan", "text" => "Nissan"]);
    array_push($makes, ["value" => "Toyota", "text" => "Toyota"]);
    array_push($makes, ["value" => "Mitsubishi", "text" => "Mitsubishi"]);
    array_push($makes, ["value" => "Subaru", "text" => "Subaru"]);
    echo json_encode($makes);
?>