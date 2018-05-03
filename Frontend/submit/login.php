<?php
    include("../php/includes.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email =  mysqli_real_escape_string($db,$_POST['email']);
        $password =  mysqli_real_escape_string($db,$_POST['password']);
        $user = new User($db, $email);

        if($user->CheckPassword($password))
        {
            $_SESSION['user'] = serialize($user);
            echo json_encode(["status" => "success"]);
        }
        else
        {
            echo json_encode(["status" => "fail"]);
        }
    }

?>