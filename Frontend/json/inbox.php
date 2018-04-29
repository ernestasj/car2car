<?php

   
    $messages = [["sender" => "Joe", "message" => "Anytime!", "messageid" => "0"]];
    array_push($messages, ["sender" => "Patrick", "message" => "Not until Monday sorry :(", "messageid" => "1"]);
    echo json_encode($messages);


?>