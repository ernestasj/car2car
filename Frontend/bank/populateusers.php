<?php
    include("../php/includes.php");
    include("./randomuser.php");
    $user_count = 100;
    $count = 0;

    while($count < $user_count)
    {
        $desc = GenerateRandomUser($db);
        $user = new User($desc);
        $user->WriteDB($db);
        $count = $count + 1;
    }

?>