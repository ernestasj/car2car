<?php
    include("../php/includes.php");
    //include("../php/loggedin.php");
     //echo json_encode($message1);
    
    $none = [];
    $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $bookingid = $request->bookingid;

    if(isset($bookingid)) {
        $user = unserialize($_SESSION['user']);
        $car = new Car;
        $email = $user->GetEmail();
        $car->LoadCarViaBooking($db, $email, $bookingid);
        echo json_encode($car->AsArray());
    }
    else
    {echo json_encode($none);
    }


?>