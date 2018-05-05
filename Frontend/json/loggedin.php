<?php
    include("../php/includes.php");
    $status = ["status" => "loggedout"];
    if(isset($_SESSION['user']))
    {
        $status = ["status" => "loggedin"];    
    }
    else
    {
        $status = ["status" => "loggedout"];
    }
    
    echo json_encode($status);
?>