<?php
    include("../php/includes.php");
    echo json_encode( GetEntries($db, "GetTransmission"));
?>