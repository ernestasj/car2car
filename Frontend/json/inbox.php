<?php

   // this needs a class. Maybe look at php/cars.php for how carids are handled
    include("../php/includes.php");
    $user = unserialize($_SESSION['user']);

    $stmt = $db->stmt_init();
    $stmt = $db->prepare("call GetInbox(?)");
    $email = $user->GetEmail();
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $channels = [];

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            array_push($channels, $row);
        }
    }

    echo json_encode($channels);


?>