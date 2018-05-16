<?php
    include("../php/includes.php");
<<<<<<< HEAD
    include("../php/loggedin.php");
=======
    //include("../php/loggedin.php");
    $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    
    if(!isset($request))
    {
        $request = new stdClass();
    }

    $search = [];
    $search["keywords"] = EmptyIfUnset($request, 'keywords');
    $search["suburb"] = EmptyIfUnset($request, 'suburb');
    $search["state"] = EmptyIfUnset($request, 'state');
    $search["postcode"] = EmptyIfUnset($request, "postcode");
    $search["monday"] = EmptyIfUnset($request, "monday");
    $search["tuesday"] = EmptyIfUnset($request, "tuesday");
    $search["wednesday"] = EmptyIfUnset($request, "wednesday");
    $search["thursday"] = EmptyIfUnset($request, "thursday");
    $search["friday"] = EmptyIfUnset($request, "friday");
    $search["saturday"] = EmptyIfUnset($request, "saturday");
    $search["sunday"] = EmptyIfUnset($request, "sunday");
    $search["public_holidays"] = EmptyIfUnset($request, "public_holidays");
    $search["make"] = EmptyIfUnset($request, "make");
    $search["model"] = EmptyIfUnset($request, "model");
    $search["body"] = EmptyIfUnset($request, "body");
    $search["doors"] = EmptyIfUnset($request, "doors");
    $search["year"] = EmptyIfUnset($request, "year");
    $search["kms"] = EmptyIfUnset($request, "kms");
    $search["enginecc"] = EmptyIfUnset($request, "enginecc");
    $search["transmission"] = EmptyIfUnset($request, "transmission");
    $search["count"] = EmptyIfUnset($request, "count");
    $search["offset"] = EmptyIfUnset($request, "offset");

    

    $cars = new Cars;
    $cars->LoadCars($db, $search);
    echo $cars->ToJSON();
    $_SESSION['cars'] = serialize($cars);
    
    /*
>>>>>>> c58eb864badfa9b74643147fb8485b868efa1b55
    if(isset($_POST["keywords"]))
    {
        $keywords = $_POST["keywords"];
        $cars = new Cars;
        $cars->LoadCars($db, $keywords);
        echo $cars->ToJSON();
        $_SESSION['cars'] = serialize($cars);
        
    
    }
    else
    {
        echo "";
    }
    
?>