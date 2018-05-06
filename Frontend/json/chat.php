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
        $inbox = [];
        $msg1 = [];
        $msg1["userid"] = 0;
        $msg1["userimage"] = "user1.jpg";
        $msg1["otherimage"] = "user2.jpg";
        $msg1["othername"] = "Bob";
        $msg1["username"] = "Robert";
        $msg1['messages'] = [];
        array_push($msg1['messages'], ["senderid" => 1, "content"=>"Hello!"]);
        array_push($msg1['messages'], ["senderid" => 0, "content"=>"Hi"]);
        array_push($msg1['messages'], ["senderid" => 1, "content"=>"Is your car available on friday?"]);
        array_push($msg1['messages'], ["senderid" => 0, "content"=>"It sure is. What time did you want to pick it up?"]);
        array_push($msg1['messages'], ["senderid" => 1, "content"=>"10:30am?"]);
        array_push($msg1['messages'], ["senderid" => 0, "content"=>"Sure!"]);
        
        array_push($inbox, $msg1);

        $msg2 = [];
        $msg2["userid"] = 0;
        $msg2["userimage"] = "user1.jpg";
        $msg2["otherimage"] = "user3.jpg";
        $msg2["othername"] = "Harry";
        $msg2["username"] = "Robert";
        $msg2['messages'] = [];
        array_push($msg2['messages'], ["senderid" => 1, "content"=>"Hello!"]);
        array_push($msg2['messages'], ["senderid" => 0, "content"=>"Hi There!"]);
        array_push($msg2['messages'], ["senderid" => 1, "content"=>"Is your car available on friday?"]);
        array_push($msg2['messages'], ["senderid" => 0, "content"=>"It sure is. What time did you want to pick it up?"]);
        array_push($msg2['messages'], ["senderid" => 1, "content"=>"10:30am?"]);
        array_push($msg2['messages'], ["senderid" => 0, "content"=>"No Way!"]);
        
        array_push($inbox, $msg2);

        //echo $bookingid;
        echo json_encode($inbox[$bookingid]);
    }
    else
    {echo json_encode($none);
    }


?>