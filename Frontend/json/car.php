<?php
    include("../php/includes.php");
    //include("../php/loggedin.php");
     //echo json_encode($message1);
    
    $none = [];
    $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    
    

    if(property_exists($request, "bookingid")) {
        $bookingid = $request->bookingid;
        $user = unserialize($_SESSION['user']);
        $car = new Car;
        $email = $user->GetEmail();
        $car->LoadCarViaBooking($db, $email, $bookingid);
        echo json_encode($car->AsArray());
    }
    else if(property_exists($request, "rego"))
    {
        $rego = $request->rego;
        $user = unserialize($_SESSION['user']);
        $car = new Car;
        $email = $user->GetEmail();
        $car->ReadDB($db, $email, $rego);
        echo json_encode($car->AsArray());
    }
    else
    {echo json_encode($none);
    }


?>