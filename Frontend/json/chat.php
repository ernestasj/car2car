<?php

    $messages = [];
    
    $message1 = [["sender" => "Bob", "message" => "Hello! :D"]];
    array_push($message1, ["sender" => "Joe", "message" => "Hi!"]);
    array_push($message1, ["sender" => "Joe", "message" => "How can I help you?"]);
    array_push($message1, ["sender" => "Bob", "message" => "When is your car available?"]);
    array_push($message1, ["sender" => "Joe", "message" => "Anytime!"]);
    
    $messages['0'] = $message1;

    $message2 = [["sender" => "Bob", "message" => "Hello! :D"]];
    array_push($message2, ["sender" => "Patrick", "message" => "Hi!"]);
    array_push($message2, ["sender" => "Patrick", "message" => "How can I help you?"]);
    array_push($message2, ["sender" => "Bob", "message" => "When is your car available?"]);
    array_push($message2, ["sender" => "Patrick", "message" => "Not until Monday sorry :("]);

    $messages['1'] = $message2;

     $none = [];
     //echo json_encode($message1);
    if(isset($_GET["messageid"])) {
        $messageid = $_GET["messageid"];
        if(array_key_exists($messageid, $messages))
        {
            $message = ["messageid" => $messageid, "messages" => $messages[$messageid]];
            echo json_encode($message);
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