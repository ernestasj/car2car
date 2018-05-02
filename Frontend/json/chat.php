<?php
    include("../php/includes.php");
    include("../php/loggedin.php");
     //echo json_encode($message1);
    
    $none = [];

    if(isset($_GET["bookingid"])) {
        $user = unserialize($_SESSION['user']);
        $bookingid = $_GET["bookingid"];
        $messages = new Messages;
        $messages->LoadMessages($db, $user->email, $bookingid);
        echo $messages->ToJSON();
    }
    else
    {
        echo json_encode($none);
    }


?>