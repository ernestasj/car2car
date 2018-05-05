<?php
    include("../php/includes.php");
    //include("../php/loggedin.php");
     //echo json_encode($message1);
    
    $none = [];
    $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $bookingid = $request->bookingid;

    if(isset($bookingid)) {
        //$user = unserialize($_SESSION['user']);
        //$messages = new Messages;
        //$messages->LoadMessages($db, $user->email, $bookingid);
        //echo $messages->ToJSON();
        $data = [];
        $data["userid"] = 0;
        $data["userimage"] = "user1.jpg";
        $data["otherimage"] = "user2.jpg";
        $data["othername"] = "Bob";
        $data["username"] = "Robert";
        $messages = [];
        array_push($messages, ["senderid" => 1, "content"=>"Hello!"]);
        array_push($messages, ["senderid" => 0, "content"=>"Hi"]);
        array_push($messages, ["senderid" => 1, "content"=>"Is your car available on friday?"]);
        array_push($messages, ["senderid" => 0, "content"=>"It sure is. What time did you want to pick it up?"]);
        array_push($messages, ["senderid" => 1, "content"=>"10:30am?"]);
        array_push($messages, ["senderid" => 0, "content"=>"Sure!"]);
        $data["messages"] = $messages;
        echo json_encode($data);
    }
    else
    {echo json_encode($none);
    }


?>