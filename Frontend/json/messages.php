<?php 

    include("../php/includes.php");

    $messages = new Messages();
    $messages->LoadMessages(1, 2, 3, 4);

    echo $messages->ToJSON();

?>