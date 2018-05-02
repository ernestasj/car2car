<?php 

    include("../php/includes.php");
    include("../php/loggedin.php");
    //include("../php/loggedin.php");

    $messages = new Messages();
    $messages->LoadMessages(1, 2, 3, 4);

    echo $messages->ToJSON();

?>