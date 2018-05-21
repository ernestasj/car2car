<?php
    include("../php/includes.php");
    include("./randomuser.php");
    //echo RandomEmail("Phillip", "Jones");

    echo json_encode(GenerateRandomUser($db));

?>