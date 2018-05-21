<?php
    include("../php/includes.php");
    $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    
    $suburb = $request->suburb;

    echo json_encode( GetEntryOneParamater($db, "GetSuburbFill", $suburb));
?>