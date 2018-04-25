<?php 

    include("../php/includes.php");

    $alerts = new Alerts();
    $alerts->LoadAlerts(1, 2, 3, 4);

    echo $alerts->ToJSON();

?>