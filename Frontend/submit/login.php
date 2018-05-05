<?php
    include("../php/includes.php");
    $postdata = file_get_contents("php://input");
    $status = ["status" => "fail"];
    $request = json_decode($postdata);
    $email = $request->email;
    $password = $request->password;
    //echo $email.$password;
    
    if(isset($email) && isset($password)) {
        $user = new User($db, $email);

        if($user->CheckPassword($password))
        {
            $_SESSION['user'] = serialize($user);
            $status = ["status" => "loggedin"];
            
        }
    }

    echo json_encode($status);
    
?>
