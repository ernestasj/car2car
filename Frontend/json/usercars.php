<?php
    include("../php/includes.php");
    //include("../php/loggedin.php");
    $cars = new Cars;
    $user = unserialize($_SESSION["user"]);
      
    
    $email = $user->GetEmail();
    $cars->LoadUserCars($db, $email);
    echo $cars->ToJSON();
    $_SESSION['usercars'] = serialize($cars);
    
?>