<?php 

    include("../php/includes.php");

    $tasks = new Tasks();
    $tasks->LoadTasks(1, 2, 3, 4);

    echo $tasks->ToJSON();

?>