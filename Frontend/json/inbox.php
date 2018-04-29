<?php

   // this needs a class. Maybe look at php/cars.php for how carids are handled
    $messages = [["sender" => "Joe", "message" => "Anytime!", "messageid" => "0"]];
    array_push($messages, ["sender" => "Patrick", "message" => "Not until Monday sorry :(", "messageid" => "1"]);
    echo json_encode($messages);


?>