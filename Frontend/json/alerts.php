<?php 

    include("../php/includes.php");
    include("../php/loggedin.php");

    $alerts = new Alerts();
    $alerts->LoadAlerts(1, 2, 3, 4);

    echo $alerts->ToJSON();

?>